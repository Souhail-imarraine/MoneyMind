<?php

namespace App\Console\Commands;
use App\Models\Expense;
use Carbon\Carbon;
use App\Models\User;

use Illuminate\Console\Command;

class DeductExpenses extends Command
{

    protected $signature = 'expenses:deduct';
    protected $description = 'Deduct expenses from user balances for the current day';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $today = now()->format('d');
        $users = User::all();

        foreach ($users as $user) {
            $expenses = Expense::where('user_id', $user->id)->where('is_recurring', '!=', 0)->get();
            foreach ($expenses as $expense) {
                $expenseDate = Carbon::parse($expense->date);
                if($expenseDate->day == $today){
                    $user->balance -= $expense->amount;
                }
            }
            $user->save();
        }
        $this->info('Expenses deducted successfully.');
    }
}
