<link rel="stylesheet" type="text/css" href="{{asset('post.css')}}"/> 
<title>{{ $post-> titreannonce." - Locations saisonières"}}</title>

@extends('layouts.app')


@section('content')


<div class="postContainer">
        <div class="postDiv">
                <div id="postPhotoDiv">
                        @foreach ($photoPosts as $photoPost)
                                @if($photoPost->image && $photoPost->idannonce === $post->idannonce)
                                        <img src="{{ $photoPost -> image}}" alt="Image de l'annonce">
                                @endif
                                @if (!$photoPost->image)
                                <p>Aucune image associée</p>
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
                                @foreach($photoUsers as $photoUser)
                                        @if($photoUser->urlphotoprofil)
                                                <img src="" alt="photo utilisateurs">
                                        @endif
                                @endforeach
                        </div>
                        <div id="basicInfoDiv">
                                
                                <h3><a href="{{ url("/profile/".$post->idproprietaire) }}">{{ $post -> owner->user->pseudocompte}}</a></h3>
                                <span> </span>
                        </div>
        
                </div>

</div>


</div>




@endsection