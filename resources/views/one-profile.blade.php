

<meta charset="UTF-8">
<title>Profil de {{ $owner -> user-> pseudocompte}}</title>
<link rel="stylesheet" type="text/css" href="{{asset('profile.css')}}"/> 

<script src="/js/view-profile.js" defer></script>

<div class="marginViewProfile">
    @extends('layouts.app')
    
    @section('content')
    
    <div class="userFrame">
        <div class="userInfo">
            <div id="photoUser">
                <img src="{{$owner->user->photoUser->urlphotoprofil}}" alt="photo utilisateurs">
            </div>
            <div id="basicUserInfo">
                <h3> {{ $owner -> user -> pseudocompte}} </h3>
                <span>
                    @if($owner -> user ->pieceidverifier)
                        Pièce d'identité vérifié                        
                    @endif
                </span>
                <span>
                    @if($owner -> user ->numtelverifier)
                        Numéro de téléphone vérifié                        
                    @endif
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
                <img width="20" height="20" src="https://img.icons8.com/fluency-systems-regular/20/bookmark-ribbon--v1.png" alt="bookmark-ribbon--v1"/>
                
                <?php
                    // Définir la locale en français
                    setlocale(LC_TIME, 'fr_FR');

                    // Convertir la date en objet DateTime
                    $dateMembre = new DateTime($owner->user->datemembre);

                    // Formater la date selon le format souhaité en utilisant le nom du mois en français
                    $affichageDate = strftime('%B %Y', $dateMembre->getTimestamp());

                    // Encoder la chaîne en UTF-8
                    $affichageDate = utf8_encode($affichageDate);

                    // Afficher le résultat
                    echo "Membre depuis $affichageDate";
                ?>
                </span>
                <span>
                <img width="20" height="20" src="https://img.icons8.com/fluency-systems-regular/20/marker--v1.png" alt="marker--v1"/>
                    {{$owner -> user-> adresse->ville->nomville}}
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