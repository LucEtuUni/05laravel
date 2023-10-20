@extends("layouts.app")
@section("title", "Editer un post")
@section("content")

<h1>Modifier un post</h1>

@if (isset($post))

<form method="POST" action="{{ route('posts.store', $post) }}" enctype="multipart/form-data" >

    @method('PUT')

@else

<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" >

@endif 

@csrf

<p>
    <label for="title">Titre</label><br/>
    <input type="text" name="title" value="{{ isset($post->title) ? $post->title : old('title') }}"  id="title" placeholder="Le titre du post" >
    @error("title")
    <div>{{ $message }}</div>
    @enderror
</p>

<p>
    <label for="picture">Couverture</label><br/>
    <input type="file" name="picture" id="picture" >
    @error("picture")
    <div>{{ $message }}</div>
    @enderror
</p>
<p>
    <label for="content">Contenu</label><br/>
    <textarea name="content" id="content" lang="fr" rows="10" cols="50" placeholder="Le contenu du post">{{ isset($post->content) ? $post->content : old('content') }}</textarea>
    @error("content")
    <div>{{ $message }}</div>
    @enderror
</p>

<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

<input type="submit" name="valider" value="Valider" >

</form>
@endsection