<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
    public function editSalary()
    {
        $user = Auth::user();
        return view('components.modals.update-salary', [
            'user' => $user,
            'salary' => $user->salary // Pass the salary to the view
        ]); // Pass user data to the view
    }

    // Method to handle the salary update
    public function updateSalary(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'salary' => 'required|numeric',
        ]);

        $user = Auth::user(); // Get the authenticated user
        if ($user instanceof \App\Models\User) { // Ensure $user is an instance of User
            $user->salary = $request->salary; // Update the salary
            $user->save(); // Save the changes
        } else {
            // Handle the case where the user is not valid
            return redirect()->route('dashboard')->with('error', 'User not found.');
        }

        return redirect()->route('dashboard')->with('success', 'Salary updated successfully!');
    }
}
