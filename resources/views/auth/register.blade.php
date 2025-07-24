@extends('layouts.app')

@section('title', 'Inscription Entrepreneur')

@section('content')
<h2>Inscription pour un stand</h2>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <label for="nom_entreprise">Nom de l'entreprise :</label><br>
    <input type="text" id="nom_entreprise" name="nom_entreprise" required><br><br>

    <label for="email">Email :</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Mot de passe :</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">S'inscrire</button>
</form>
@endsection
