<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- ... -->
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
                        {{-- Ajoutez l'inclusion de la vue des notifications ici --}}
                        <li>
                            @include('notifications')
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
