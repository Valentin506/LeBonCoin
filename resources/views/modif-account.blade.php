

<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<!-- Formulaire pour les inscriptions -->


<div class="marginViewProfile">
    @extends('layouts.app')
    
    @section('content')
    
    <div class="userFrame">
        <div class="userInfo">
            
            <div id="basicUserInfo">
                <h3>Pseudo : {{$user-> pseudocompte}}</h3>
                <p>Email : {{$user-> emailcompte}}</p>
                <p>Numéro de téléphone : {{$user-> numtelcompte}}</p>
                <button href="{{ url("/account/58/modif-account") }}" id="buttonPostDeposit" type="submit">Modifier mon profil</button>
            </div>
           
        </div>
    
    </div>
    
    @endsection

</div>