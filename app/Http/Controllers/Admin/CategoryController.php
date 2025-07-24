<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie créée avec succès !');
    }
}