<?php

namespace App\Http\Controllers;
use App\Models\SavingsGoal;
use App\Mail\GoalAchievedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index()
    {
        $goals = SavingsGoal::where('user_id', auth()->id())->get();
        $balance = auth()->user()->balance;
        $totalTargetAmount = $goals->sum('goal_amount');

        return view('pages.goals', [
            'goals' => $goals,
            'balance' => $balance,
            'totalTargetAmount' => $totalTargetAmount,
            ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'goal_amount' => 'required|numeric|min:0',
            'monthly_saving' => 'required|numeric|min:0',
        ]);

        // dd($validated);

        $goal = new SavingsGoal();

        $goal->name = $validated['name'];
        $goal->goal_amount = $validated['goal_amount'];
        $goal->monthly_saving = $validated['monthly_saving'];
        $goal->user_id = auth()->id();
        $goal->current_amount = 0;
        $goal->save();

        return redirect()->back()->with('success', 'Objectif créé avec succès!');
    }


    public function destroy($id)
    {
        $goal = SavingsGoal::findOrFail($id);

            if ($goal->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Non autorisé à supprimer cet objectif.');
        }

        $user = auth()->user();

        // Refund the current_amount to user's balance
        if ($goal->current_amount > 0) {
            $user->balance += $goal->current_amount;
            $user->save();
        }

        $goal->delete();

        return redirect()->back()->with('success', 'Objectif supprimé et montant remboursé avec succès!');
    }

    public function checkGoalAchievement(SavingsGoal $goal)
    {
        if ($goal->current_amount >= $goal->goal_amount && !$goal->is_achieved) {
            // Mark the goal as achieved
            $goal->is_achieved = true;
            $goal->save();

            // Send email notification
            Mail::to($goal->user->email)->send(new GoalAchievedMail($goal));
        }
    }

    public function updateProgress(Request $request, $id)
    {
        $goal = SavingsGoal::findOrFail($id);

        if ($goal->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        $goal->current_amount = $validated['amount'];
        $goal->save();

        // Check if goal is achieved
        $this->checkGoalAchievement($goal);

        return response()->json([
            'success' => true,
            'message' => 'Progress updated successfully',
            'percentage' => round(($goal->current_amount / $goal->goal_amount) * 100)
        ]);
    }
}
