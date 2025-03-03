<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Expense; 
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $expenses = Expense::where('user_id', auth()->id())->get();  // You can add more filters if needed
        return view('pages.transactions', compact('categories', 'expenses')); // Pass to the view
    }

    public function store(Request $request)
    {

        $request->merge([
            'category_id' => (int) $request->category_id, 
            'is_recurring' => filter_var($request->is_recurring, FILTER_VALIDATE_BOOLEAN)
        ]);

        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'amount' => 'required|numeric',
                'category_id' => 'required|integer',
                'date' => 'required|date',
                'is_recurring' => 'required|boolean',
            ]);
    
            $validatedData['user_id'] = auth()->id();
    
            // dd('Validation Passed', $validatedData);
    
            Expense::create($validatedData);
    
            return redirect()->route('transactions.store')->with('success', 'Expense added successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());
        }
    }


    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        $categories = Category::all(); // Fetch categories for the dropdown
        return view('components.modals.edit-transaction', compact('expense', 'categories')); // Pass both expense and categories
    }

    
    public function update(Request $request, $id)
    {
        $request->merge([
            'category_id' => (int) $request->category_id, 
            'is_recurring' => filter_var($request->is_recurring, FILTER_VALIDATE_BOOLEAN)
        ]);
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'is_recurring' => 'required|boolean',
        ]);

        $expense = Expense::findOrFail($id);
        $expense->update($validatedData);
    
        return redirect()->route('transactions')->with('success', 'Dépense mise à jour avec succès!');
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        return redirect()->route('transactions')->with('success', 'Dépense supprimée avec succès!');
    }
    

} 