@extends('layouts.app')

@section('content')
<style>
    .home {
        background-image: url('{{ asset('images/accueil.jpg') }}');
        background-size: cover; /* Ajustez cette ligne */
        background-position: center;
        height: 30vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
    }

    .title {
        font-size: 24px; /* Ajustez la taille de la police ici */
        font-weight: bold;
        color: #fff;
        margin-bottom: 20px;
    }

    .button-container {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #FFDDC1;
        padding: 20px;
        border-top: 2px solid #FF8C61;
    }

    .custom-button {
        width: 150px;
        height: 150px;
        background-color: #007bff;
        color: #fff;
        font-size: 18px;
        font-weight: bold;
        margin: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: none;
        border-radius: 50%;
        cursor: pointer;
    }
</style>

<div class="home">
    <div class="title">Gatiserie</div>
</div>
<div class="button-container">
    <button class="custom-button">Bouton 1</button>
    <button class="custom-button">Bouton 2</button>
    <button class="custom-button">Bouton 3</button>
</div>
@endsection
