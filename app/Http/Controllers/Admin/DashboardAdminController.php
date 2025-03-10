<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Expense;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function index(): View
    {
        $totalUsers = User::count();
        $averageIncome = User::avg('salary');
        $activeUsers = User::where('salary_day', '<', now()->subMonths(2))->count();

        return view('admin.index', compact(
            'totalUsers',
            'averageIncome',
            'activeUsers',
        ));
    }
}
