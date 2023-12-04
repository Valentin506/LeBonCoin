<link rel="stylesheet" type="text/css" href="{{ asset('app.css') }}" />

@extends('layouts.app')

@section('title', 'Leboncoin')

@section('content')

<div class="register">
    <h2>Bonjour !</h2>
    <p>Connectez-vous pour découvrir toutes nos fonctionnalités.</p>

    <form method="POST" action="{{ route('login') }}" >
        @csrf
        <label for="email">Email</label>
        <input type="email" name="emailcompte"/>
        <label for="password">Mot de passe</label>
        <input type="password" name="passwd"/>
        <input type="submit" value="connexion"/>

        <label>Envie de nous rejoindre ?</label>
        <a href="{{ url("/create-account") }}">Créez un compte</a>

        {{ $errors }}
    </form>

</div>

@endsection