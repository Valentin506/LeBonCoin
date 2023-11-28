




<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<!-- Formulaire pour les inscriptions -->


@extends('layouts.app')

@section('title', 'Leboncoin')



@section('content')



<!-- <div class="form-register"> -->
<div class="register">

<form action="{{url("/create-account/save") }}" method="post" class="form">

<div class="form-register" id="form">
<h2> Créez votre compte</h2>
  <div>
        <label for="email">Email</label>
        <input type="email" name="email" value='{{ old("email") }}'>
        @if($errors->has('email'))
            <p class="text-danger">{{ $errors->first('email') }}</p>
        @endif
        
    </div>
   

    <div>
    <label for="password">Mot de Passe</label>
        <input type="password" name="password"  value='{{ old("password") }}' required   minlength="12">
        
    </div>


    <div>
    <label for="tel">Numéro de téléphone</label>
        <input type="tel" name="tel" value='{{ old("tel") }}' pattern="0[0-9]{9}" placeholder="0640175369" maxlength="10" required >
        @if($errors->has('tel'))
            <p class="text-danger">{{ $errors->first('tel') }}</p>
        @endif
    </div>

    <div>
        <label for="pseudo">Nom d'utilisateur</label>
        <input type="pseudo" name="pseudo" value='{{ old("pseudo") }}'>
        @if($errors->has('pseudo'))
            <p class="text-danger">{{ $errors->first('pseudo') }}</p>
        @endif
        
    </div>

    <p>
        <label for="adresse">Adresse</label>
        <input type="adresse" name="adresse" id="adresse" value='{{ old("adresse") }}'>
        <ul name="completion" id="completion"></ul> 
    </p>
    <div class="login">
        <button type="submit" Value="S'inscrire">S'inscrire</button>
    </div>

    <input name="numero" id="numero" type="hidden"/>
    <input name="rueclient" id="rueclient" type="hidden"/>
    <input name="codepostal" id="codepostal" type="hidden"/>
    <input name="ville" id="ville" type="hidden"/>
    <input name="departement" id="departement" type="hidden" />
    <input name="pays" id="pays" type="hidden"/>




  

    

    <label>Vous avez déjà un compte ?</label>
    <a href="{{url("/login")}}">Se connecter</a>
</div>
  @csrf

  
</form>
</div>
<!-- </div> -->

<script>

const form = document.querySelector("#form")

const adresseInput = document.querySelector("#adresse")
const completionSelect = document.querySelector("#completion")

adresseInput.addEventListener("keyup", event => {

    if (adresseInput.value.length > 4) {
        fetch("https://api-adresse.data.gouv.fr/search/?q="+adresseInput.value)
            .then(response => response.json())
            .then(data => {
                completionSelect.querySelectorAll("li").forEach(option => option.remove())
                data.features.forEach( feature =>  {
                    let option = document.createElement("li")
                    completionSelect.appendChild(option)
                    option.innerHTML = feature.properties.label
                    option.addEventListener("click", e => {
                        form.querySelector("#numero").value =  feature.properties.housenumber
                        form.querySelector("#rueclient").value =  feature.properties.street
                        form.querySelector("#codepostal").value = feature.properties.postcode
                        form.querySelector("#ville").value =  feature.properties.city
                        form.querySelector("#departement").value =  feature.properties.postcode
                        form.querySelector("#pays").value = "France" // :wink:
                        completionSelect.querySelectorAll("li").forEach(option => option.remove())
                        adresseInput.value = feature.properties.label
                    
                    })
                })    
            })

    }

})


</script>








@endsection


