<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 


@extends('layouts.app')

@section('title', 'Leboncoin')



@section('content')
<h2>Bonjour !</h2>
<p>Connectez-vous pour découvrir toutes nos fonctionnalités.</p>


<form action="{{url("/connect-acount") }}" method="post" class="form">


<div>
    <label  for="email">E-mail</label><br>
        <input class="form-register" type="email" name="email">
    </div>

    <div>
        <label  for="password">Mot de passe</label><br>
        <input class="form-register" type="password" name="password">
        
    </div>  
    <button id="buttonPostDeposit" type="button">Se connecter</button> <br>
    <label>Envie de nous rejoindre ?</label>
    <a href="{{url("/create-account")}}">Créez un compte</a>
</div>



@endsection