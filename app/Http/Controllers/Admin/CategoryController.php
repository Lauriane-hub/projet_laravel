<?php

// Fichier: app/Http/Controllers/Admin/CategoryController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Affiche la page de gestion des catégories
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    // Enregistre une nouvelle catégorie
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        // Création
        Category::create([
            'name' => $request->name,
        ]);

        // Redirection avec un message de succès
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie créée avec succès !');
    }
}