<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Eat&Drink')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Styles basiques pour la demo */
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f8f9fa; }
        header { background: #007bff; color: white; padding: 1rem; }
        nav a { color: white; margin-right: 1rem; text-decoration: none; }
        nav a:hover { text-decoration: underline; }
        main { padding: 2rem; }
        footer { background: #343a40; color: white; padding: 1rem; text-align: center; position: fixed; bottom: 0; width: 100%; }
    </style>
</head>
<body>
    <header>
        <h1>Eat&Drink</h1>
        <nav>
            <a href="{{ route('home') }}">Accueil</a>
            <a href="{{ route('register') }}">Inscription</a>
            <a href="{{ route('login') }}">Connexion</a>
            <a href="{{ route('stands.public') }}">Nos Exposants</a>
            @auth
                <a href="{{ route('dashboard') }}">Tableau de bord</a>
                <form style="display:inline" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" style="background:none; border:none; color:white; cursor:pointer;">Déconnexion</button>
                </form>
            @endauth
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; 2025 Eat&Drink - Tous droits réservés
    </footer>
</body>
</html>
