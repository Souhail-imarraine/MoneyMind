<?php

namespace App\Jobs;

use App\Models\ExpenseAlert;
use App\Models\Expense;
use App\Mail\ExpenseAlertMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckExpenseAlerts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $alerts = ExpenseAlert::where('is_active', true)
                             ->where('is_notified', false)
                             ->get();

        foreach ($alerts as $alert) {
            $user = $alert->user;

            // Calculer les dépenses du mois
            $monthlyExpenses = Expense::where('user_id', $user->id)
                ->whereMonth('created_at', now()->month)
                ->sum('amount');

            // Calculer le pourcentage
            $percentage = ($monthlyExpenses / $user->monthly_income) * 100;

            // Si le seuil est dépassé
            if ($percentage >= $alert->threshold_percentage) {
                // Envoyer l'email
                Mail::to($user->email)->send(
                    new ExpenseAlertMail($alert, $percentage, $monthlyExpenses)
                );

                // Marquer l'alerte comme notifiée
                $alert->update(['is_notified' => true]);
            }
        }
    }
}
