@extends('layouts.app')
@section('title', 'Tous les articles')
@section('content')

    <h1>Tous les articles</h1>

    <p>
        <a href="{{ route('posts.create') }}" title="Créer un article">Créer un nouveau post</a>
    </p>

    <table border="1">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Créé par</th>
                <th colspan="2">Opérations</th>
            </tr>
        </thead> 
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>
                    <a href="{{ route('posts.show', $post) }}" title="Lire l'article">{{ $post->title }}</a>
                </td>
                <td>
                    {{ $post->user->name }}
                </td>
                <td>
                    <a href="{{ route('posts.edit', $post) }}" title="Modifier l'article">Modifier</a>
                </td>
                <td>
                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="x Supprimer">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Affichage des liens de pagination -->
    {{ $posts->links() }}

@endsection
