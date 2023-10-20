@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Profile') }}</h2>

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')

                        <!-- Display any status messages if the profile was updated -->
                        @if (session('status') === 'profile-updated')
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <strong class="font-bold">Success!</strong>
                                <span class="block sm:inline">Your profile has been updated.</span>
                            </div>
                        @endif

                        <div class="mb-4">
                            <label for="name" class="block text-gray-600 dark:text-gray-300 text-sm font-medium mb-2">
                                Name
                            </label>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name', $user->name) }}"
                                required
                                autocomplete="name"
                                class="form-input block w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600"
                            />
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-600 dark:text-gray-300 text-sm font-medium mb-2">
                                Email
                            </label>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email', $user->email) }}"
                                required
                                autocomplete="email"
                                class="form-input block w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600"
                            />
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="w-full py-2 px-4 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
