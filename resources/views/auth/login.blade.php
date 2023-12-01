<link rel="stylesheet" type="text/css" href="{{ asset('app.css') }}" />

@extends('layouts.app')

@section('title', 'Leboncoin')

@section('content')

<div class="register">
    <h2>Bonjour !</h2>
    <p>Connectez-vous pour découvrir toutes nos fonctionnalités.</p>

    <form method="POST" action="{{ route('login') }}" >
        @csrf

        <input type="email" name="emailcompte"/>
        <input type="password" name="passwd"/>
        <input type="submit" value="connexion"/>

        <label>Envie de nous rejoindre ?</label>
        <a href="{{ url("/create-account") }}">Créez un compte</a>

        {{ $errors }}
    </form>

</div>

@endsection