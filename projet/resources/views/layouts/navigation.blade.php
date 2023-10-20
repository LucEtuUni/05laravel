<nav x-data="{ open: false }" class="bg-primary border-b border-gray-100 dark:border-gray-700"> <!-- Primary Navigation
    Menu --> <div class="container mx-auto px-4 sm:px-6 lg:px-8"> <div class="flex justify-between h-16"> <div
    class="flex items-center"> <!-- Logo --> <a href="{{ route('dashboard') }}" class="flex items-center">
        <span class="text-gray-800 dark:text-gray-200 text-lg font-semibold">Gatiserie</span> </a> </div>


        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10"> @auth <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900
                dark:text-gray-400
                dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                wire:navigate>Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400
        dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Log
            in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900
            dark:text-gray-400
            dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            wire:navigate>Register
    </a> @endif @endauth </div? <!-- Settings Dropdown -->
    <div
        class="hidden
                    sm:flex sm:items-center sm:ml-6"> <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-primary text-sm leading-4 font-medium
                            rounded-md text-gray-500 dark:text-gray-400 bg-primary hover:text-secondary
                            dark:bg-gray-800 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
        @if (Auth::check())
        <div>{{ Auth::user()->name }}</div>
        @else
        <div>You are not logged in</div>
        @endif
        <div class="ml-1">
            <svg class="fill-current h-4 w-4 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4
                                    4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </div>
        </button>
        </x-slot>

        <x-slot name="content">
            <x-dropdown-link :href="route('profile.edit')"
                class="text-primary hover:text-secondary dark:text-gray-200 dark:hover:text-gray-300">
                {{ __('Profile') }}
            </x-dropdown-link>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                    class="text-primary hover:text-secondary dark:text-gray-200 dark:hover:text-gray-300">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </x-slot>
        </x-dropdown>
    </div>
    </div>
    </div>
</nav>