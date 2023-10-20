<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>/* Styles for the menu */
/* Styles for the menu */
nav {
    background-color: red; /* Fond rouge */
    color: white; /* Texte en blanc */
    padding: 10px; /* Espace intérieur autour du contenu du menu */
    display: flex; /* Utilisation de flexbox */
    align-items: center; /* Aligner verticalement les éléments */
    justify-content: space-between; /* Espacement égal entre les éléments du menu */
}

nav a {
    text-decoration: none; /* Supprimer la soulignement des liens */
    color: white; /* Texte en blanc */
    margin-left: 20px; /* Marge à gauche entre les éléments du menu, ajustez selon vos besoins */
}

nav ul {
    list-style: none; /* Supprimer les puces de liste */
    padding: 0;
}

nav ul li {
    display: inline; /* Les éléments du menu sont côte à côte */
}
</style>
</head>
<body>
    <div id="app">
        <nav>
            <div>
                <a href="{{ route('accueil') }}">
                    <img src="{{ asset('images/accueil.png') }}" alt="Gatiserie Logo">
                </a>
            </div>
            <div>
                <a href="{{ route('posts.index') }}">Posts</a>
            </div>
            
            <div>
                <ul>
                    @guest
                        @if (Route::has('login'))
                            <li>
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @else
                        <li>
                        <div>
                            <a href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a>
                        </div>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                        <li>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
