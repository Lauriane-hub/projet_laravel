<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StandController;

// Page d'accueil publique
Route::get('/', function () {
    return view('home');
})->name('home');

// Formulaire d'inscription (inscription stand entrepreneur)
Route::get('/inscription', function () {
    return view('auth.register');
})->name('register');

// Formulaire de connexion
Route::get('/connexion', function () {
    return view('auth.login');
})->name('login');

// Page publique liste des stands approuvés
Route::get('/stands', [StandController::class, 'index'])->name('stands.public');

// Page publique détail d'un stand
Route::get('/stands/{stand}', [StandController::class, 'show'])->name('stands.show');

// Routes protégées par auth middleware (dashboard, logout)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', function () {
        auth()->logout();
        return redirect()->route('home');
    })->name('logout');
});
