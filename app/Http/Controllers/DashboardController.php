<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Expense;
use App\Models\SavingsGoal;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $balance = $user->balance;
        $totalDepenses = Expense::where('user_id', auth()->id())->sum('amount');
        $monthlyTrends = $this->getMonthlyTrends();

        $expensesAndGoals = $this->getExpensesAndGoals();
        $totalAmount = $expensesAndGoals->sum('amount');

        return view('pages.dashboard', compact('user', 'balance', 'totalDepenses', 'expensesAndGoals', 'totalAmount', 'monthlyTrends'));
    }

    public function editSalary()
    {
        $user = Auth::user();
        return view('pages.dashboard', compact('user'));
    }

    private function getExpensesAndGoals()
    {
        // 1. Récupérer le total des dépenses du mois
        $monthlyExpenses = DB::table('expenses')
            ->where('user_id', auth()->id())
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('amount');

        // 2. Récupérer l'objectif d'épargne
        $savingsGoal = SavingsGoal::where('user_id', auth()->id())
            ->first();

        // 3. Créer la collection de données
        return collect([
            [
                'label' => 'Dépenses',
                'amount' => $monthlyExpenses,
                'color' => '#ef4444', // Rouge
                'icon' => 'fa-wallet'
            ],
            [
                'label' => 'Objectif Épargne',
                'amount' => $savingsGoal ? $savingsGoal->goal_amount : 0,
                'current' => $savingsGoal ? $savingsGoal->current_amount : 0,
                'color' => '#22c55e', // Vert
                'icon' => 'fa-piggy-bank'
            ]
        ]);
    }


    private function getMonthlyTrends()
    {
        // Récupérer les 12 derniers mois
        return DB::table('expenses')
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('SUM(amount) as total')
            )
            ->where('user_id', auth()->id())
            ->whereDate('created_at', '>=', now()->subMonths(11))
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                return [
                    'month' => Carbon::createFromDate($item->year, $item->month, 1)->format('M'),
                    'total' => $item->total
                ];
            });
    }

}
