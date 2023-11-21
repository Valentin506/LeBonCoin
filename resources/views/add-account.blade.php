




<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<!-- Formulaire pour les inscriptions -->


@extends('layouts.app')

@section('title', 'Leboncoin')



@section('content')


<h2> Créez votre compte</h2>



<form action="{{url("/create-account/save") }}" method="post" class="form">
<div class="form-register">
  <div>
        <label for="email">Email</label>
        <input type="email" name="email">
        
    </div>

    <div>
    <label for="password">Mot de Passe</label>
        <input type="password" name="password">
        
    </div>


    <div>
    <label for="tel">Numéro de téléphone</label>
        <input type="tel" name="tel" >
        
    </div>

    <div>
        <label for="pseudo">Nom d'utilisateur</label>
        <input type="pseudo" name="pseudo">
        
    </div>


  <div class="login">
        <button type="submit" Vakue="S'inscrire">S'inscrire</button>
    </div>

    <label>Vous avez déjà un compte ?</label>
    <a href="{{url("/login")}}">Se connecter</a>
</div>
  @csrf
</form>
  


    
    


   

</div>








@endsection


