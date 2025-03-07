<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\Expense;

class CalculateMonthlyExpenses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expenses:calculate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate total expenses for the current month';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $startOfMounth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $totalExpensesMounth = Expense::whereBetween('date', [$startOfMounth, $endOfMonth])
        ->sum('amount');

        $this->info("Total expenses for the month: $totalExpensesMounth");

    }
}
