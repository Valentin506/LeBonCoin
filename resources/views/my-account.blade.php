

<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<link rel="stylesheet" type="text/css" href="{{asset('profile.css')}}"/> 
<!-- Formulaire pour les inscriptions -->


<div class="marginViewProfile">
    @extends('layouts.app')
    
    @section('content')
    
    <div >
        <div >
            
            <div id=boxUserName>
                <img id="photoUser" src="https://img.leboncoin.fr/api/v1/tenants/9a6387a1-6259-4f2c-a887-7e67f23dd4cb/domains/20bda58f-d650-462e-a72a-a5a7ecf2bf88/buckets/21d2b0bc-e54c-4b64-a30b-89127b18b785/images/profile/pictures/default/160d38b1-0bfe-569b-aa4b-9131a31cb641?rule=pp-large" alt="Photo de profil">
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
