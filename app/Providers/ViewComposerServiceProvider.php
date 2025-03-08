<?php

namespace App\Providers;

use App\Services\GeminiAIService;
use App\Models\Expense;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('components.dashboard.header', function ($view) {
            try {
                $user = auth()->user();

                if (!$user) {
                    $view->with([
                        'aiAdvice' => 'Veuillez vous connecter pour voir vos conseils.',
                        'totalExpenses' => 0,
                        'lastUpdate' => null
                    ]);
                    return;
                }

                $cacheKey = "ai_advice_" . $user->id;

                $data = Cache::remember($cacheKey, now()->addHour(), function () use ($user) {
                    // Récupérer les dépenses du mois
                    $monthlyExpenses = Expense::where('user_id', $user->id)
                        ->whereMonth('created_at', now()->month)
                        ->sum('amount');

                    // dd($monthlyExpenses);
                    // Préparer les données
                    $userData = [
                        'name' => $user->name,
                        'income' => $user->salary,
                        'expenses' => $monthlyExpenses
                    ];

                    // dd($userData);

                    // Obtenir le conseil
                    $gemini = new GeminiAIService();
                    $advice = $gemini->getAdvice($userData);

                    return [
                        'advice' => $advice,
                        'expenses' => $monthlyExpenses,
                        'lastUpdate' => now()->format('H:i')
                    ];

                });

                $view->with([
                    'aiAdvice' => $data['advice'],
                    'totalExpenses' => $data['expenses'],
                    'lastUpdate' => $data['lastUpdate']
                ]);

            } catch (\Exception $e) {
                $view->with([
                    'aiAdvice' => 'Conseil temporairement indisponible.',
                    'totalExpenses' => 0,
                    'lastUpdate' => null
                ]);
            }
        });
    }
}
