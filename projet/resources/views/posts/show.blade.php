@extends("layouts.app")
@section("title", $post->title)
@section("content")

@if(auth()->check() && auth()->user()->id == $post->user_id)
    <a href="{{ route('posts.edit', $post) }}">Modifier</a>
    <form method="POST" action="{{ route('posts.destroy', $post) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
@endif
<h1>{{ $post->title }}</h1>
<img src="{{ asset('storage/'.$post->picture) }}" alt="Image de couverture" style="max-width: 300px;">
<div>{{ $post->content }}</div>

@if(auth()->check()) 
<form method="post" action="{{ route('comments.store') }}">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <textarea name="content" placeholder="Écrivez votre commentaire"></textarea>
    <button type="submit">Poster un commentaire</button>
</form>
@else
<p>Connectez-vous pour laisser un commentaire.</p>
@endif
<div>
    <h2>Commentaires</h2>
    @foreach($post->comments as $comment)
        <div>
            <p>{{ $comment->content }}</p>
            <small>Par {{ $comment->user->name }}</small>
        </div>
    @endforeach
</div>
@endsection