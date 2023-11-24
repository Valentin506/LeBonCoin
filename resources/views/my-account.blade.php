

<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<link rel="stylesheet" type="text/css" href="{{asset('profile.css')}}"/> 
<!-- Formulaire pour les inscriptions -->


<div class="marginViewProfile">
    @extends('layouts.app')
    
    @section('content')
    
    <div >
        <div >
            {{$user-> adresse}}
            {{$user->photoUser}} {{$user-> idphotoprofil === $user-> photoUser-> idphotoprofil}}
            
            <div id=boxUserName>
                <img id="photoUser" src="{{$user->photoUser->urlphotoprofil}}" alt="Photo de profil">
                <h3>{{$user-> pseudocompte}}</h3>
            </div>
            <p>Email : {{$user-> emailcompte}}</p>
            <p>Numéro de téléphone : {{$user-> numtelcompte}}</p>
            <button href="{{ url("/account/.Auth::user()->idcompte/modif-account") }}" id="buttonPostDeposit" type="button">Modifier mon profil</button>
           
            
           
        </div>
    
    </div>
    
    @endsection

</div>
