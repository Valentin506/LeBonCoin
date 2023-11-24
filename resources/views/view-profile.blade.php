@if({{$owner->user->pseudocompte}})
    <title>Profil de {{$owner->user->pseudocompte}} </title>
@else
    <title>Profil de {{$user->pseudocompte}} </title>
@endif
<link rel="stylesheet" type="text/css" href="{{asset('profile.css')}}"/> 
<script src="/js/view-profile.js" defer></script>
<div class="marginViewProfile"> 
    @extends('layouts.app')
    
    @section('content')
    
    <div class="userFrame">
        <div class="userInfo">
            <div id="photoUser">
                <img src={{ $todaysPhoto['image'] }} alt="photo utilisateurs">
            </div>
            <div id="basicUserInfo">
                <h3> SandrineGeraldrine </h3>
                <span>
                    Pièce d'identité vérifiée
                </span>
                <span>
                    Numéro de téléphone vérifié
                </span>
    
            </div>
            <div>
            <button id="buttonPostDeposit" type="button">Suivre</button> 
            <div class="userMore">
                <div class="popupDiv" onclick="popupOptions()">
                    <button>
                    </button>                     
                    <span class="popuptext" id="myPopup">
                        <div id="moreOptionsDiv">
                            <header>
                                <p>Plus d'options</p>
                                <span id="buttonX">X</span>
                            </header>
                            <span>Signaler cet utilisateur</span>
                            <span>Partager</span>
                        </div>
                    </span>
                </div>

            </div>
            
            </div>
            
        </div>
        <div class="userDetailInfo">
            <div>
                <span>
                    Membre depuis xxx
                </span>
                <span>
                    Répondre généralement en xxx
                </span>
                <span>
                    Lieu habitation
                </span>
            </div>
            <div id="nbStars">
                <div>⭐</div>
                <div>⭐</div>
                <div>⭐</div>
                <div>⭐</div>
                <div>⭐</div>
                <span>x avis</span>
    
            </div>
        </div>
    
    </div>
    
    @endsection

</div>






