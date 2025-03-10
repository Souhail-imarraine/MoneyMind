<?php

namespace App\Console\Commands;

use App\Http\Controllers\AlertController;
use Illuminate\Console\Command;

class CheckExpenseAlerts extends Command
{
    protected $signature = 'alerts:check';
    protected $description = 'Check expense alerts and send notifications';

    public function handle(AlertController $alertController)
    {
        $this->info('Checking expense alerts...');
        $alertController->checkAlerts();
        $this->info('Done!');
    }
}
