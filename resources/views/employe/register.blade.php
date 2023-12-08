@extends('layouts.app')

@section('content')
<form action="{{ route('employe.register') }}" method="post">
    @csrf
    <label for="Nom">Nom</label>
    <input type="text" name="Nom" required>

    <label for="Prenom">Prenom</label>
    <input type="text" name="Prenom" required>

    <label for="datenaissanceemploye">Date de naissance</label>
    <input type="text" name="datenaissanceemploye" required>
    
    <label for="emailemploye">Email</label>
    <input type="email" name="emailemploye" required>

    <label for="password">Password</label>
    <input type="password" name="password" required>

    <button type="submit">Register</button>
</form>
@endsection
