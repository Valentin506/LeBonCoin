

<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<link rel="stylesheet" type="text/css" href="{{asset('profile.css')}}"/> 
<!-- Formulaire pour les inscriptions -->


<div class="marginViewProfile">
    @extends('layouts.app')
    
    @section('content')
    
    <div >
        <div >
            
            <div id=boxUserName>
                <img id="photoUser" src="$user->photoprofil->urlphotoprofil" alt="Photo de profil">
                <h3>{{$user-> pseudocompte}}</h3>
            </div>
            @if($user->idimage)
                <div id=boxUserName>
                    <h3>Pseudo : {{$user-> pseudocompte}}</h3>
                </div>
            @else
                <p>Email : {{$user-> emailcompte}}</p>
                <p>Numéro de téléphone : {{$user-> numtelcompte}}</p>
                <button href="{{ url("/account/.Auth::user()->idcompte/modif-account") }}" id="buttonPostDeposit" type="button">Modifier mon profil</button>
            @endif
            </div>
           
        </div>
    
    </div>
    
    @endsection

</div>
