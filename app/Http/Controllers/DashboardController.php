<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;

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
        return view('pages.dashboard', compact('user', 'balance', 'totalDepenses'));
    }

    public function editSalary()
    {
        $user = Auth::user();
        return view('pages.dashboard', compact('user'));
    }
}
