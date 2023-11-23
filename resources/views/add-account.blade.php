




<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<!-- Formulaire pour les inscriptions -->


@extends('layouts.app')

@section('title', 'Leboncoin')



@section('content')






<form action="{{url("/create-account/save") }}" method="post" class="form">
<div class="form-register">
<h2> Créez votre compte</h2>
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

    <div>
        <label for="adresse">Adresse</label>
        <input type="adresse" name="adresse" id="adresse">
        <select name="completion" id="completion">
        </select> 
    </div>

    <script>
        const adresseInput = document.querySelector("#adresse")
        const completionSelect = document.querySelector("#completion")

        adresseInput.addEventListener("keyup", event => {
            if(adresseInput.value.lenght > 4){
                fetch("htttps://api-adresse.data.gouv.fr/search/?q="adresseInput.value)
                    .then(reponse => reponse.json())
                    .then(data => {
                        completionSelect.querySelectorAll("option").foreach(option => option.remove())
                        data.features.foreach( feauture => {
                            let option = document.createElement("option")
                            completionSelect.appendChild(option)
                            option.innerHTML = feature.properties.city
                        })
                    })
            }
        })

    </script>

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
  


    
    


   

</div>








@endsection


