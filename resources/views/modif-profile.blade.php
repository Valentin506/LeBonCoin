
<link rel="stylesheet" type="text/css" href="{{asset('profile.css')}}"/> 
<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<!-- Formulaire pour les inscriptions -->

<div class="marginViewProfile">
    @extends('layouts.app')
    
    @section('content')

<form action="{{url("/modif-profile/updateProfile") }}" method="post" class="form">
<div class="form-register" id="form">
        <div class="userInfoModif">
            <h2>Paramètres</h2>
            
            <div id="basicUserInfoModif">

                <h3>Profil</h3>
                <div id=boxModifEmail>
                    <img id="photoUser" src="{{$user->photoUser->urlphotoprofil}}" alt="photo utilisateurs" >

                </div>
                <p for="pseudocompte">Nom d'utilisateur</p>
                <input id="pseudocompte"type="text" name="pseudocompte" value="{{$user->pseudocompte}}"/>

                
             
            </div>
            <button type="submit" id="buttonPostDeposit" type="button">Enregistrer les modifications</button>
        </div>
    @csrf
    </div>

</div>


@endsection



