
<title>Profil de  </title>
<link rel="stylesheet" type="text/css" href="{{asset('profile.css')}}"/> 


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
            <div class="userMore">
                <button></button>
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






