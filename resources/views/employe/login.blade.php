<link rel="stylesheet" type="text/css" href="{{ asset('app.css') }}" />

@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('employe.login') }}" class="register">
        <h2>Bienvenue !</h2>
        <h3>Espace employés</h3>
        @csrf

        <label for="emailemploye">Email:</label>
        <input type="email" name="emailemploye" required>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>

        <button type="submit">Connexion</button>
        <label>Envie de nous rejoindre ?</label>
        <a href="{{ url("/register") }}">Créez un compte</a>
        {{ $errors }}
    </form>
@endsection
