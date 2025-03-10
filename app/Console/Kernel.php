<?php

namespace App\Console;


use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\CheckExpenseAlerts;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('salary:add-salary')->monthly();
        $schedule->command('expenses:deduct')->daily();
        $schedule->command('expenses:calculate')->monthly();
        $schedule->command('savings:process-monthly')->everyMinute();
        $schedule->command('alerts:check')->daily();
        $schedule->job(new CheckExpenseAlerts)->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
