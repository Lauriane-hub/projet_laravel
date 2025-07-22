<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // Fichier : app/Http/Middleware/AdminMiddleware.php

    public function handle(Request $request, Closure $next): Response
    {
        // 1. Vérifie si l'utilisateur est connecté ET si son rôle est 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            // 2. Si c'est un admin, on le laisse passer à la page suivante.
            return $next($request);
        }

        // 3. Si ce n'est pas un admin, on le redirige vers son tableau de bord par défaut.
        return redirect('/dashboard')->with('error', 'Accès non autorisé.');
    }
}
