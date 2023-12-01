
<head>
        <link rel="stylesheet" type="text/css" href="{{asset('post.css')}}"/> 
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
        <title>{{ $post-> titreannonce." - Locations saisonières"}}</title>
        
</head>

@extends('layouts.app')


@section('content')
<body>        
        <div class="postContainer">
                <div class="postDiv">
                        <!-- image description with slider -->
                        <div class="postPhoto">
                                <div class="postPhotoButton">
                                        <button class="prevArrow"><</button>
                                        <button class="nextArrow">></button>

                                </div>
                                <div class="postTotalPhotoDiv">
                                        @foreach ($photoPosts as $photoPost)
                                        @if($photoPost->image && $photoPost->idannonce === $post->idannonce)
                                        <div class="postPhotoDiv">
                                                <img src="{{ $photoPost -> image}}" alt="Image de l'annonce">
                                        </div>
                                        @endif
                                        @endforeach
                                        
                
                                </div>

                        </div>
                        
                        <!-- description div for post description -->
                        <div id="postDescriptionDiv">
                                <ul class="elementsDescription">
                                        <h2>{{ $post -> titreannonce }}</h2>
                                        <li>{{ $post -> typeHebergement ->libelletypehebergement }}</li>
                                        <li>•</li>
                                        <li>{{ $post -> capaciteLogement -> nombrepersonne }} personnes</li>
                                        <li>•</li>
                                        <li>{{ $post -> adresseAnnonce -> ville -> nomville }}</li>
                                </ul>
                                
                                @if($post->paiementenligne)
                                Paiement en ligne disponible
                                @else
                                Paiement en ligne pas disponible
                                @endif
                                
                                <p>Publié le {{ $post -> datepublication }}</p>
                                <h3>Description</h3>
                                <p>{{ $post -> description }}</p>
                                <h3>Critères</h3>
                                <div id="postCriteresDiv">
                                        <div>
                                                <p>Nombre d'étoiles</p>
                                                <span>Non classé</span>
                                        </div>
                                        <div>
                                                <p>Capacité</p>
                                                <span>{{ $post->idcapacite}} personnes</span>
                                        </div>
                                        <div>
                                                <p>Type de logement</p>
                                                <span>{{ $post->typeHebergement->libelletypehebergement}}</span>
                                        </div>
                                        
                                        <div>
                                                <p>Nature du logement</p>
                                                <span>{{ $post->typeHebergement->libelletypehebergement}}</span>
                                        </div>
                                </div>
                                
                                <!-- to return to locations page -->
                                <h3><p><a href="{{ url("/posts") }}">Retour vers les locations saisonières</a></p></h3>
                        </div>
                
                </div>
                
                <!-- div about owner -->
                <div class="ownerPostDiv">
                        <!-- date avail div -->
                        <div id="postDateDiv">
                                <div></div>
                                <div></div>
                        </div>
                        <!-- photo and info owner div -->
                        <div id="postOwnerDiv">
                                <!-- photo for each owner of the post -->
                                <div id="divPhotoOwner">
                                        <img src="{{$post->owner->user->photoUser->urlphotoprofil}}" alt="photo utilisateurs">
                                </div>
                                <!-- basic info owner -->
                                <div id="basicInfoDiv">
                                        <!-- link owner with post -->
                                        <h3><a href="{{ url("/profile/".$post->idproprietaire) }}">{{ $post -> owner->user->pseudocompte}}</a></h3>
                                        <!-- total of owner's posts -->
                                        @php $totalPosts = 0; @endphp
                                        @foreach ($posts as $post)
                                                @if($post->idproprietaire === $owner->idproprietaire)
                                                        @php $totalPosts++; @endphp
                                                @endif
                                        @endforeach
                                        <p>{{$totalPosts}} annonces</p>
                                        <p>Note de x sur x</p>
                                </div>
                                <div><a href="{{ url("/profile/".$post->idproprietaire) }}"><img src="https://cdn-icons-png.flaticon.com/512/32/32213.png" alt="arrow direct to owner page"></a></div>
                
                        </div>
        
                </div>
        
        </div>

        <!-- slider -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script type="text/javascript">
                $('.postTotalPhotoDiv').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        prevArrow: $(".prevArrow"),
                        nextArrow: $(".nextArrow")
                });
        </script>
</body>




@endsection