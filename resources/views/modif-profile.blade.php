
<link rel="stylesheet" type="text/css" href="{{asset('profile.css')}}"/> 
<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<!-- Formulaire pour les inscriptions -->

<div class="marginViewProfile">
    @extends('layouts.app')
    
    @section('content')

<form action="{{url("/modif-profile/updateProfile") }}" method="post" class="form" enctype='multipart/form-data'>
<div class="form-register" id="form">
        <div class="userInfoModif">
            <h2>Paramètres</h2>
            
            <div id="basicUserInfoModif">

                <h3>Profil</h3>
                <div id=boxModifEmail>
                    <img id="photoUser" class="image-clickable" src="{{ $user->photoUser->urlphotoprofil }}" alt="photo utilisateurs">
                    <input type="file" name="nouvellePhoto" id="nouvellePhoto" style="display: none;">
                </div>
                <p for="pseudocompte">Nom d'utilisateur</p>
                <input id="pseudocompte"type="text" name="pseudocompte" value="{{$user->pseudocompte}}"/>

                
             
            </div>
            <button type="submit" id="buttonPostDeposit" type="button">Enregistrer les modifications</button>
        </div>
    @csrf
    </div>

</div>

<script>
        document.addEventListener('DOMContentLoaded', function () {
            var imageClickable = document.querySelector('.image-clickable');
            var inputPhoto = document.getElementById('nouvellePhoto');

            // Ajoutez un écouteur d'événement pour cliquer sur le champ de fichier lorsque l'image est cliquée
            imageClickable.addEventListener('click', function () {
                inputPhoto.click();
            });
        });
    </script>


@endsection



