<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('pages.transactions', compact('categories')); // Pass to view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Category created successfully.');
    }

}
