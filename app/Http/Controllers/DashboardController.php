<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Données de test pour le dashboard
        $data = [
            'balance' => 12560,
            'balanceChange' => 1234,
            'expenses' => 4890,
            'expensesChange' => -320,
            'income' => 8750,
            'incomeChange' => 550,
            'savings' => 15320,
            'savingsChange' => 1200,
            'chartLabels' => ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
            'chartData' => [500, 800, 450, 1000, 600, 750, 400],
            'recentTransactions' => [
                [
                    'name' => 'Marjane',
                    'category' => 'Courses',
                    'amount' => -450,
                    'date' => 'Aujourd\'hui',
                    'icon' => 'shopping-bag',
                    'color' => 'red'
                ],
                [
                    'name' => 'Salaire',
                    'category' => 'Revenu',
                    'amount' => 8500,
                    'date' => 'Hier',
                    'icon' => 'briefcase',
                    'color' => 'green'
                ]
            ]
        ];

        return view('pages.dashboard', $data);
    }
}