<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SalaryController extends Controller
{

    public function editSalary($id)
    {
        $user = User::findOrFail($id);
        // dd($user);
        return view('dashboard.edit', compact('salary'));
    }

    public function updateSalary(Request $request)
    {
        $request->validate([
            'salary' => 'required|numeric',
        ]);

        $user = Auth::user();
        if ($user instanceof \App\Models\User) {
            $user->salary = $request->salary;
            $user->save();
        } else {
            return redirect()->route('dashboard')->with('error', 'User not found.');
        }

        return redirect()->route('dashboard')->with('success', 'Salary updated successfully!');
    }
}
