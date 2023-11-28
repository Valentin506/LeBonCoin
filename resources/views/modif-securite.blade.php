
<link rel="stylesheet" type="text/css" href="{{asset('profile.css')}}"/> 
<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<!-- Formulaire pour les inscriptions -->

<div class="marginViewProfile">
    @extends('layouts.app')
    
    @section('content')

<form action="{{url("/modif-account/updateSecurite") }}" method="post" class="form">
<div class="form-register" id="form">
        <div class="userInfoModif">
            <h2>Paramètres</h2>
            
            <div id="basicUserInfoModif">

                <p for="motdepasse">Mot de passe</p>
                <input id="motdepasse"type="text" name="motdepasse" />

                
             
            </div>
            <button type="submit" id="buttonPostDeposit" type="button">Enregistrer les modifications</button>
        </div>
    @csrf
    </div>

</div>


@endsection



