@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $user->name }}</h2>
                        <a href="{{ route('profile.edit') }}" class="text-blue-500 hover:underline">Edit Profile</a>
                    </div>

                    <p class="text-gray-600 dark:text-gray-300 mb-4">Total Posts: {{ $user->posts->count() }}</p>

                    <div class="mb-6">
                        @foreach ($user->posts->chunk(5) as $chunk)
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                                @foreach ($chunk as $post)
                                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow">
                                        <div class="p-4">
                                            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">{{ $post->title }}</h3>
                                            <p class="text-gray-600 dark:text-gray-300">{{ $post->created_at->format('F d, Y') }}</p>
                                            <p class="text-gray-700 dark:text-gray-300">{{ $post->content }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
