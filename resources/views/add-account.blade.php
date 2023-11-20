




<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<!-- Formulaire pour les inscriptions -->


@extends('layouts.app')

@section('title', 'Leboncoin')



@section('content')


<h2> Créez votre compte</h2>



<form action="{{url("/create-account/save") }}" method="post" class="form">
    

    <!-- <label>
      <input type="radio" name="inputType" value="personnel" onclick="showInput('personnel')"> Pour vous
    </label>
    <label>
      <input type="radio" name="inputType" value="professionel" onclick="showInput('professionel')"> Pour votre entreprise
    </label>

    <div id="personnelInput" class="hidden">
    <label for="dynamicPersonnel" name="email">Email:</label>
    <input type="email" id="dynamicPersonnel">

    <label for="dynamicPersonnel" name="password">Mot de passe:</label>
    <input type="password" id="dynamicPersonnel">

    <label for="dynamicPersonnel" name="tel">Numéro de téléphone:</label>
    <input type="tel" id="dynamicPersonnel">

    <label for="dynamicPersonnel" name="name">Nom:</label>
    <input type="text" id="dynamicPersonnel">

    <label for="dynamicPersonnel" name="firstname">Prenom:</label>
    <input type="text" id="dynamicPersonnel">

    

  </div>
  

  <div id="professionelInput" class="hidden">
    <label for="dynamicProfessionel">Numéro de Siret:</label>
    <input type="numeric" id="dynamicProfessionel">

    <label for="dynamicProfessionel">Nom de société:</label>
    <input type="text" id="dynamicProfessionel">

    <label for="dynamicProfessionel">Adresse:</label>
    <input type="text" id="dynamicProfessionel">


    <label for="dynamicProfessionel">Ville:</label>
    <input type="text" id="dynamicProfessionel">

    <label for="dynamicProfessionel">Code Postal:</label>
    <input type="numeric" id="dynamicProfessionel">

    <label for="dynamicProfessionel">Secteur d'activité:</label>
    
    <select name="" id="">
        <Option>Hello</Option>
        <Option>Ouistiti</Option>
    </select>
    <div class="auto-search-wrapper">
  </div>
 
  </div> -->
  <div>
        <input type="email" name="email">
        <label for="email">Email</label>
    </div>

    <div>
        <input type="password" name="password">
        <label for="password">Mot de Passe</label>
    </div>


    <div id="textInput" class="hidden">
        <input type="tel" name="tel" >
        <label for="tel">Numéro de téléphone</label>
    </div>

    <div id="textInput" class="hidden">
        <input type="name" name="name">
        <label for="name">Nom</label>

        <input type="firstname" name="firstname">
        <label for="firstname">Prénom</label>
    </div>


    <div id="textInput" class="hidden">
        <input type="date" name="date">
        <label for="date">Date de naissance</label>
    </div>
    <div id="textInput" class="hidden">
        <input type="adress" name="adress">
        <label for="tel">Adresse </label>

        <input type="contry" name="contry">
        <label for="contry">Ville ou code postal </label>
    </div>


  <div class="login">
        <button type="submit" Vakue="S'inscrire"></button>
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


