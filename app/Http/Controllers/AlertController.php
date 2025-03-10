<?php

namespace App\Http\Controllers;

use App\Models\ExpenseAlert;
use App\Models\Category;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Mail\ExpenseAlertMail;
use Illuminate\Support\Facades\Mail;
class AlertController extends Controller
{
    public function index()
    {
        $alerts = ExpenseAlert::with('category')
            ->where('user_id', auth()->id())
            ->get();
        $categories = Category::all();

        return view('pages.alerts', compact('alerts', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'threshold_percentage' => 'required|integer|min:1|max:100',
            'category_id' => 'nullable|exists:categories,id',
            'alert_type' => 'required|in:total,category'
        ]);

        ExpenseAlert::create([
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'threshold_percentage' => $validated['threshold_percentage'],
            'category_id' => $validated['category_id'],
            'alert_type' => $validated['alert_type'],
            'is_active' => true
        ]);

        return redirect()->route('alerts.index')
            ->with('success', 'Alerte créée avec succès');
    }

    public function destroy(ExpenseAlert $alert)
    {
        if ($alert->user_id !== auth()->id()) {
            return redirect()->route('alerts.index')
                ->with('error', 'Vous n\'êtes pas autorisé à supprimer cette alerte.');
        }

        try {
            $alert->delete();
            return redirect()->route('alerts.index')->with('success', 'Alerte supprimée avec succès');
        } catch (\Exception $e) {
            return redirect()->route('alerts.index')->with('error', 'Erreur lors de la suppression de l\'alerte');
        }
    }

    public function checkAlerts()
    {
        // Au lieu de dépendre de auth()->user(), on récupère tous les alerts actifs
        $alerts = ExpenseAlert::with(['user', 'category'])  // Charger les relations
            ->where('is_active', true)
            ->where('is_notified', false)
            ->get();

        foreach ($alerts as $alert) {
            try {
                $user = $alert->user;  // Obtenir l'utilisateur via la relation

                if (!$user) {
                    \Log::warning("Alerte #{$alert->id}: Utilisateur non trouvé");
                    continue;
                }

                $monthlyExpenses = $this->calculateExpenses($alert, $user);
                $percentage = $this->calculatePercentage($monthlyExpenses, $user->monthly_income);

                if ($percentage >= $alert->threshold_percentage) {
                    $this->sendAlert($alert, $monthlyExpenses, $percentage, $user);
                }
            } catch (\Exception $e) {
                \Log::error("Erreur pour l'alerte #{$alert->id}: " . $e->getMessage());
            }
        }
    }

    private function calculateExpenses($alert, $user)
    {
        $query = Expense::where('user_id', $user->id)  // Utiliser l'ID de l'utilisateur passé
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year);

        if ($alert->alert_type === 'category') {
            $query->where('category_id', $alert->category_id);
        }

        return $query->sum('amount');
    }

    private function calculatePercentage($expenses, $income)
    {
        return $income > 0 ? ($expenses / $income) * 100 : 0;
    }

    private function sendAlert($alert, $expenses, $percentage, $user)
{
    if (!$user->email) {
        \Log::warning("Utilisateur #{$user->id} n'a pas d'email");
        return;
    }

    try {
        Mail::to($user->email)->send(
            new ExpenseAlertMail($alert, $percentage, $expenses)
        );

        $alert->update(['is_notified' => true]);
        \Log::info("Alerte envoyée à l'utilisateur #{$user->id}");
    } catch (\Exception $e) {
        \Log::error("Erreur d'envoi d'email: " . $e->getMessage());
    }
}
}
