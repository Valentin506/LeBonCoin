
<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<!-- Formulaire pour les inscriptions -->


@extends('layouts.app')

@section('title', 'Leboncoin')



@section('content')
<div class="form-login">

<h2> Créez votre compte</h2>



<form action="{{ url("/create-account/save") }}" method="post" class="form">
    @csrf

    <div class="login">
        <input type="radio" name="radio">
        <label for="radio">Pour vous *</label>
    </div>

    <div class="login">
        <input type="radio" name="radio">
        <label for="radio">Pour votre entreprise</label>
    </div>

    <div class="login">
        <input type="email" name="email">
        <label for="email">Email</label>
    </div>

    <div class="login">
        <input type="password" name="password">
        <label for="password">Mot de Passe</label>
    </div>


    <div class="login">
        <input type="tel" name="tel" >
        <label for="tel">Numéro de téléphone</label>
    </div>

    <div class="login">
        <input type="name" name="name">
        <label for="name">Nom</label>

        <input type="firstname" name="firstname">
        <label for="firstname">Prénom</label>
    </div>


    <div class="login">
        <input type="date" name="date">
        <label for="date">Date de naissance</label>
    </div>
    <div class="login">
        <input type="adress" name="adress">
        <label for="tel">Adresse </label>

        <input type="contry" name="contry">
        <label for="contry">Ville ou code postal </label>
    </div>

    <div class="login">
        <button type="submit">S'inscrire</button>
    </div>


   
</form>
</div>
@endsection


