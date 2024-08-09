<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categorydb = Category::all();
        return view('admin.categorydb', compact('categorydb'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name' => $request -> name,
        ]);

        return redirect()->route('categorydb.index')
                         ->with('success', 'Category saved successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request -> name,
        ]);

        return redirect()->route('categorydb.index')
                         ->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
            $category->delete();

        return redirect()->route('categorydb.index')
                         ->with('success', 'Category deleted successfully.');
    }
}
