<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\User;

class AddMonthlySalary extends Command
{
    protected $signature = 'salary:add-salary';
    protected $description = 'Add monthly salary to users';

    public function handle()
    {
        $users = User::all();

        $dayNow = now()->format('d');

        foreach ($users as $user) {
            if (!$user->salary_day) {
                $this->error("User ID {$user->id} has no salary_day set.");
                continue;
            }

            $dayUser = Carbon::createFromFormat('d', $user->salary_day)->format('d');

            if ($dayNow == $dayUser) {
                $user->balance += $user->salary;
                $user->save();
                $this->info("Salary added for user ID {$user->id}");
            }
        }

        $this->info('Salary process completed.');
    }
}
