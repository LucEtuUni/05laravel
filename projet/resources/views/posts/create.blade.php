@extends("layouts.app")
@section("title", "Créer un post")
@section("content")

<h1>Créer un post</h1>

<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">

    @csrf

    <p>
        <label for="title">Titre</label><br/>
        <input type="text" name="title" value="{{ old('title') }}" id="title" placeholder="Le titre du post">
        @error("title")
        <div>{{ $message }}</div>
        @enderror
    </p>

    <p>
        <label for="picture">Couverture</label><br/>
        <input type="file" name="picture" id="picture">
        @error("picture")
        <div>{{ $message }}</div>
        @enderror
    </p>

    <p>
        <label for="content">Contenu</label><br/>
        <textarea name="content" id="content" lang="fr" rows="10" cols="50" placeholder="Le contenu du post">{{ old('content') }}</textarea>
        @error("content")
        <div>{{ $message }}</div>
        @enderror
    </p>

    <input type="submit" name="valider" value="Valider" >

</form>
@endsection