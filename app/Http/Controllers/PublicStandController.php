<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use Illuminate\Http\Request;

class PublicStandController extends Controller
{
    /**
     * Affiche la liste des stands approuvés sur la page d'accueil.
     */
    public function index()
    {
        // 1. Récupérer UNIQUEMENT les stands avec le statut 'approuve'
        // On charge aussi la catégorie et l'exposant pour afficher leur nom
        $stands = Stand::where('status', 'approuve')
                       ->with('category', 'user')
                       ->latest()
                       ->get();

        // 2. Retourner une vue publique et lui passer les stands
        return view('welcome', ['stands' => $stands]);
    }
}