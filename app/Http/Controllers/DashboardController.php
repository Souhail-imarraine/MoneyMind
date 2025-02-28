<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('pages.dashboard', compact('user'));
    }

    public function editSalary()
    {
        $user = Auth::user();
        return view('pages.dashboard', compact('user'));
    }
}
