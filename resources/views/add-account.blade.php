




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
    <label for="name">Nom</label>
        <input type="name" name="name">
        
        <label for="firstname">Prénom</label>
        <input type="firstname" name="firstname">
        
        <label for="pseudo">Nom d'utilisateur</label>
        <input type="pseudo" name="pseudo">
        
    </div>


    <div>
    <label for="date">Date de naissance</label>
        <input type="date" name="date">
        
    </div>
    <div>
    <label for="tel">Adresse </label>
        <input type="adress" name="adress">
        
        <label for="contry">Ville ou code postal </label>
        <input type="contry" name="contry">
        
    </div>


  <div class="login">
        <button type="submit" Vakue="S'inscrire">S'inscrire</button>
    </div>

    <label>Vous avez déjà un compte ?</label>
    <a href="{{url("/connect-account")}}">Se connecter</a>
</div>
  @csrf
</form>
  <script>
    function showInput(inputType) {
      var personnelInput = document.getElementById("personnelInput");
      var professionelInput = document.getElementById("professionelInput");

      // Hide all inputs
      personnelInput.classList.add("hidden");
      professionelInput.classList.add("hidden");

      // Show the selected input
      if (inputType === "personnel") {
        personnelInput.classList.remove("hidden");
      } else if (inputType === "professionel") {
        professionelInput.classList.remove("hidden");
      }
    }
  </script>


    
    


   

</div>








@endsection


