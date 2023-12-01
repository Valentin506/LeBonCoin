
<head>
        <link rel="stylesheet" type="text/css" href="{{asset('post.css')}}"/> 
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
        <title>{{ $post-> titreannonce." - Locations saisonières"}}</title>
        
</head>

@extends('layouts.app')


@section('content')
<body>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        
        
        <div class="postContainer">
                <div class="postDiv">
                        <div class="postTotalPhotoDiv">
                                @foreach ($photoPosts as $photoPost)
                                
                                        @if($photoPost->image && $photoPost->idannonce === $post->idannonce)
                                        <div class="postPhotoDiv">
                                                <img src="{{ $photoPost -> image}}" alt="Image de l'annonce">
                                        </div>
                                        @endif
                                                
                                
                                @endforeach
                                
        
                        </div>
                        
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
                                
                                <h3><p><a href="{{ url("/posts") }}">Retour vers les locations saisonières</a></p></h3>
                        </div>
                
                </div>
                
                <div class="ownerPostDiv">
                        <div id="postDateDiv">
                                <div></div>
                                <div></div>
                        </div>
                        <div id="postOwnerDiv">
                        
                                <div id="divPhoto">
                                        
                                                @if($photoUser->urlphotoprofil)
                                                        <img src="{{$photoUser->urlphotoprofil}}" alt="photo utilisateurs">
                                                @endif
                                                @if(!$photoUser->urlphotoprofil)
                                                        <img src="" alt="photo utilisateurs">
                                                @endif
                                        
                                </div>
                                <div id="basicInfoDiv">
                                        
                                        <h3><a href="{{ url("/profile/".$post->idproprietaire) }}">{{ $post -> owner->user->pseudocompte}}</a></h3>
                                        <span> </span>
                                </div>
                
                        </div>
        
        </div>
        
        
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script type="text/javascript">
                $('.postTotalPhotoDiv').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        prevArrow: '<button type="button" class="slick-custom-arrow slick-prev"> < </button>',
                        nextArrow: '<button type="button" class="slick-custom-arrow slick-next"> > </button>'
                });
        </script>
</body>




@endsection