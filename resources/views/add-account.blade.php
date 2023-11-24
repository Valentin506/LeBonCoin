




<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<!-- Formulaire pour les inscriptions -->


@extends('layouts.app')

@section('title', 'Leboncoin')



@section('content')



<!-- <div class="form-register"> -->


<form action="{{url("/create-account/save") }}" method="post" class="form" id="form">
<div class="form-register">
<h2> Créez votre compte</h2>
  <div>
        <label for="email">Email</label>
        <input type="email" name="email">
        
    </div>

    <div>
    <label for="password">Mot de Passe</label>
        <input type="password" name="password" required   minlength="12">
        
    </div>


    <div>
    <label for="tel">Numéro de téléphone</label>
        <input type="tel" name="tel" >
        
    </div>

    <div>
        <label for="pseudo">Nom d'utilisateur</label>
        <input type="pseudo" name="pseudo">
        
    </div>

    <p>
        <label for="adresse">Adresse</label>
        <input type="adresse" name="adresse" id="adresse">
        <ul name="completion" id="completion"></ul> 
    </p>

    <input name="numero" id="numero" type="hidden">
    <input name="rueclient" id="rueclient" type="hidden">
    <input name="codepostal" id="codepostal" type="hidden">
    <input name="ville" id="ville" type="hidden">
    <input name="pays" id="pay" type="hidden">

    

    <div>
        <label for="ville">Ville</label>
        <input type="ville" name="ville">
    </div>

  <div class="login">
        <button type="submit" Vakue="S'inscrire">S'inscrire</button>
    </div>

    <label>Vous avez déjà un compte ?</label>
    <a href="{{url("/login")}}">Se connecter</a>
</div>
  @csrf
</form>
  
<!-- </div> -->

<script>
        const form = document.querySelector("#form")

        const adresseInput = document.querySelector("#adresse")
        const completionSelect = document.querySelector("#completion")

        adresseInput.addEventListener("keyup", event => {
            if(adresseInput.value.lenght > 4){
                fetch("htttps://api-adresse.data.gouv.fr/search/?q="+adresseInput.value)
                    .then(reponse => reponse.json())
                    .then(data => {
                        completionSelect.querySelectorAll("li").foreach(option => option.remove())
                        data.features.foreach( feauture => {
                            let option = document.createElement("li")
                            completionSelect.appendChild(option)
                            option.innerHTML = feature.properties.label
                            option.addEventListener("click",e => {
                                form.querySelector("#numero").value = feture.properties.housenumber
                                form.querySelector("#rueclient").value = feture.properties.street
                                form.querySelector("#codepostal").value = feture.properties.postcode
                                form.querySelector("#ville").value = feture.properties.city
                                form.querySelector("#pays").value = "France"
                                completionSelect.querySelectorAll("li").foreach(option => option.remove())
                                adresseInput.value = feature.properties.label
                            })
                        })
                    })
            }
        })

    </script>








@endsection


