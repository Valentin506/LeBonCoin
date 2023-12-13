

<meta charset="UTF-8">
<title>Profil de {{ $owner -> user-> pseudocompte}}</title>
<link rel="stylesheet" type="text/css" href="{{asset('profile.css')}}"/> 

<script src="/js/view-profile.js" defer></script>

@extends('layouts.app')

@section('content')
<div class="marginViewProfile">
    
    
    <div class="userFrame">
        <div class="userInfo">

            
            <div id="photoUser">
                @if (Str::startsWith($owner->user->photoUser->urlphotoprofil, 'https'))
                        <img src="{{$owner->user->photoUser->urlphotoprofil}}" alt="photo utilisateurs">
                @else
                        <img id="photoUser" src="/images/{{ $owner->user->photoUser->urlphotoprofil}}" alt="Photo de profil">
                @endif
                
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


    <div class="userPost">
        <div id="userInfoPost">
            @php $totalPost =0; @endphp
            @foreach($posts as $post)
                @if($post->owner->idcompte)
                    @php $totalPost++; @endphp
                @endif
            @endforeach
            <p>{{$totalPost}} annonce(s)</p>
            <div>
                <button>Plus récentes</button>
            </div>
        </div>
        <div id="userPosts">
            @foreach ($posts as $post)
            <div class="divForEachPost">
                <div>
                    <h3><a href="{{ url("/post/".$post->idannonce) }}">{{ $post-> titreannonce}}</a></h3>
                </div>
                @php $hasPhoto = false; @endphp
                @foreach ($photoPosts as $photoPost)
                @if($photoPost-> idannonce === $post->idannonce)
                    <div id="divImagePost">
                        <img src="{{ $photoPost -> image}}" alt="Image de l'annonce">
                        @php $hasPhoto = true; break; @endphp
                    </div>
                    @endif
                @endforeach
            @endforeach

            
                
            </div>

            
            
        </div>

    </div>
    
</div>
@endsection