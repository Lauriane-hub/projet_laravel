<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use Illuminate\Http\Request;

class StandController extends Controller
{
    // Affiche la liste des stands approuvés
    public function index()
    {
        $stands = Stand::whereHas('user', function ($query) {
            $query->where('role', 'entrepreneur_approuve');
        })->get();

        return view('stands.index', compact('stands'));
    }

    // Affiche les détails d'un stand avec ses produits
    public function show(Stand $stand)
    {
        $stand->load('produits');  // Charge les produits liés

        return view('stands.show', compact('stand'));
    }
}
