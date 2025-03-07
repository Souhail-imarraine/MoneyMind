<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SavingsGoal;
use App\Models\User;

class ProcessMonthlySavings extends Command
{
    protected $signature = 'savings:process-monthly';
    protected $description = 'Process monthly savings for all active goals';

    public function handle()
    {
        $goals = SavingsGoal::all();

        foreach ($goals as $goal) {
            $user = User::find($goal->user_id);
            
            if ($user->balance >= $goal->monthly_saving) {
                $user->balance -= $goal->monthly_saving;
                $goal->current_amount += $goal->monthly_saving;
                
                $user->save();
                $goal->save();
                
                $this->info("Processed savings for goal: {$goal->name}");
            } else {
                $this->warn("Insufficient balance for goal: {$goal->name}");
            }
        }

        $this->info('Monthly savings processing completed!');
    }
}