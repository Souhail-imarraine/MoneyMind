<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'categoryName' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create([
            'name' => $validated['categoryName'],
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Catégorie ajoutée avec succès');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'editCategoryName' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $validated['editCategoryName'],
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Catégorie modifiée avec succès');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Catégorie supprimée avec succès');
    }
}
