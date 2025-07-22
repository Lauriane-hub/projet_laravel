<?php

// Fichier: app/Http/Controllers/Exposant/StandController.php

namespace App\Http\Controllers\Exposant;

use App\Http\Controllers\Controller;
use App\Models\Category; // On a besoin des catégories
use App\Models\Stand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\StandStatusUpdated;

class StandController extends Controller
{
    // Affiche le formulaire de création de stand
    public function create()
    {
        // On récupère toutes les catégories pour les afficher dans un menu déroulant
        $categories = Category::all();
        return view('exposant.stand.create', ['categories' => $categories]);
    }

    // Enregistre la demande de stand
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id', // Doit exister dans la table categories
        ]);

        // Création du stand associé à l'utilisateur connecté
        Stand::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(), // ID de l'utilisateur actuellement connecté
            'status' => 'en_attente', // Statut par défaut
        ]);

        return redirect('/dashboard')->with('success', 'Votre demande de stand a été soumise avec succès ! Elle est en attente de validation.');
    }


        // Affiche les stands de l'utilisateur connecté// Exemple dans un futur StandController
    public function edit(Stand $stand)
    {
        // Cette ligne va automatiquement utiliser StandPolicy
        // et lever une erreur 403 (Forbidden) si la règle échoue.
        $this->authorize('update', $stand);

        // Si on passe, on peut continuer et retourner la vue du formulaire de modification.
        return view('exposant.stand.edit', ['stand' => $stand]);
    }

        public function update(Request $request, Stand $stand)
{
    $request->validate([
        'status' => 'required|in:approuve,rejete',
    ]);

    $stand->status = $request->status;
    $stand->save();

    // === NOTRE AJOUT : ENVOI DE LA NOTIFICATION ===
    // On récupère l'utilisateur propriétaire du stand et on lui envoie la notification
    $stand->user->notify(new StandStatusUpdated($stand));
    // ===============================================

    return redirect()->route('admin.stands.index')->with('success', 'Le statut du stand a été mis à jour et l'exposant a été notifié.');
}


}
