<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Vérifie si l'utilisateur a le rôle demandé.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role  Le rôle requis
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        if (!$user || $user->role !== $role) {
            abort(403, 'Accès non autorisé');
        }

        return $next($request);
    }
}
