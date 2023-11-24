<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 


@extends('layouts.app')

@section('title', 'Leboncoin')



@section('content')

<div class="form-register">

<h2>Bonjour !</h2>
<p>Connectez-vous pour découvrir toutes nos fonctionnalités.</p>


<form action="{{ route('auth.login') }}" method="post" class="form">
    
    @csrf

    <div>
        <label for="emailcompte">E-mail</label><br>
        <input class="form-register" type="emailcompte" name="emailcompte" id="emailcompte" required>
        @error("email")
        {{ $message }}
        @enderror
    </div>

    <div>
        <label  for="password">Mot de passe</label><br>
        <input class="form-register" type="password" name="password" id="pssword" required>
        @error("password")
        {{ $message }}
        @enderror
    </div>  
    <div>
    <button id="buttonPostDeposit" type="submit">Se connecter</button><br>
    </div>
    <label>Envie de nous rejoindre ?</label>
    <a href="{{url("/create-account")}}">Créez un compte</a>
    </div>
    

</div>
</form>



@endsection