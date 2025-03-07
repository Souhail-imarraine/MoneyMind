<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function index(Request $request)
    {
        $expenses = Expense::where('user_id', auth()->id())->paginate(10);
        return view('pages.transactions', [
            'categories' => Category::all(),
            'expenses' => $expenses,
            'totalTransaction' => $expenses->total(),
            'totalDépenses' => $expenses->sum('amount'),
        ]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'category_id' => (int) $request->category_id,
            'is_recurring' => filter_var($request->is_recurring, FILTER_VALIDATE_BOOLEAN)
        ]);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date|after_or_equal:today',
            'is_recurring' => 'required|boolean',
        ]);

        $user = auth()->user();

        if ($user->balance >= $validatedData['amount']) {
            $validatedData['user_id'] = $user->id;
            Expense::create($validatedData);
            $user->decrement('balance', $validatedData['amount']);
            return redirect()->route('transactions')->with('success', 'Expense added successfully.');
        }

        return back()->with('error', 'Not enough balance for this expense.');
    }

    public function edit($id)
    {
        return view('components.modals.edit-transaction', [
            'expense' => Expense::findOrFail($id),
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->merge([
            'category_id' => (int) $request->category_id,
            'is_recurring' => filter_var($request->is_recurring, FILTER_VALIDATE_BOOLEAN)
        ]);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date|after_or_equal:today',
            'category_id' => 'required|exists:categories,id',
            'is_recurring' => 'required|boolean',
        ]);

        $expense = Expense::findOrFail($id);
        $user = auth()->user();
        $oldAmount = $expense->amount;

        if ($user->balance + $oldAmount >= $validatedData['amount']) {
            $user->increment('balance', $oldAmount);
            $expense->update($validatedData);
            $user->decrement('balance', $validatedData['amount']);

            return redirect()->route('transactions')->with('success', 'Transaction updated successfully.');
        }

        return back()->with('error', 'Not enough balance for this update.');
    }



    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        // dd($expense);
        $user = auth()->user();
        $user->increment('balance', $expense->amount);
        $expense->delete();
        
        return redirect()->route('transactions')->with('success', 'Expense deleted successfully.');
    }
}
