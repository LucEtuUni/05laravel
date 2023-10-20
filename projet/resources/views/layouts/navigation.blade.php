<nav>
    <div>
        <div>
            <!-- Logo -->
            <a href="{{ route('dashboard') }}">
                <span>Gatiserie</span>
            </a>
        </div>
    </div>
    <div>
    <a href="{{ route('posts.index') }}">
                Posts
            </a>
        @auth
        <a href="{{ url('/dashboard') }}">
            Dashboard
        </a>
        @else
        <a href="{{ route('login') }}">
            Log in
        </a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">
            Register
        </a>
        @endif
        @endauth
    </div>
    <div>
        @if (Auth::check())
        <div>{{ Auth::user()->name }}</div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                Log Out
            </a>
        </form>
        @else
        <div>You are not logged in</div>
        @endif
    </div>
</nav>
