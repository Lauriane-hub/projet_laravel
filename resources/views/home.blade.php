@extends('layouts.app')

@section('title', 'Accueil - Eat&Drink')

@section('content')
    <h2>Bienvenue sur Eat&Drink !</h2>
    <p>Découvrez les meilleurs stands culinaires de notre événement.</p>
    <p>Pour les entrepreneurs, <a href="{{ route('register') }}">inscrivez-vous ici</a> pour demander un stand.</p>
@endsection
