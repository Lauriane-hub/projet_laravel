<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stand;
use Illuminate\Http\Request;

class StandController extends Controller
{
    /**
     * Affiche la liste de tous les stands pour l'admin.
     */
    public function index()
    {
        // On récupère tous les stands, en les triant pour voir les "en attente" en premier.
        $stands = Stand::with('user', 'category') // Eager loading pour la performance
                        ->orderByRaw("FIELD(status, 'en_attente', 'approuve', 'rejete')")
                        ->latest()->get();

        return view('admin.stands.index', ['stands' => $stands]);
    }

    /**
     * Met à jour le statut du stand (approuvé ou rejeté).
     */
    public function update(Request $request, Stand $stand)
    {
        // Valide que le statut envoyé est bien 'approuve' ou 'rejete'
        $request->validate([
            'status' => 'required|in:approuve,rejete',
        ]);

        // Met à jour le statut du stand
        $stand->status = $request->status;
        $stand->save();

        return redirect()->route('admin.stands.index')->with('success', 'Le statut du stand a été mis à jour.');
    }
}