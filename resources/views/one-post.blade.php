<link rel="stylesheet" type="text/css" href="{{asset('post.css')}}"/> 
<title>{{ $post-> titreannonce." - Locations saisonières"}}</title>

@extends('layouts.app')


@section('content')

<div class="postContainer">
        <div class="postDiv">
                
                @if($post->image)
                      <img src="{{ $photoPost-> image}}" alt="Image de l'annonce">
                  @else
                      <p>Aucune image associée</p>
                  @endif
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
                <h3>{{ $post -> idadresse }}</h3>
        
        </div>
        
        <div class="ownerPostDiv">
                <div id="postDateDiv">
                        <div></div>
                        <div></div>
                </div>
                <div id="postOwnerDiv">
                        <div id="divPhoto">
                                <img src="" alt="photo utilisateurs">
                        </div>
                        <div id="basicInfoDiv">
                                
                                <h3><a href="{{ url("/profile/".$post->idproprietaire) }}">{{ $post -> owner->user->pseudocompte}}</a></h3>
                                <span> </span>
                        </div>
        
                </div>

</div>


</div>



<p><a href="{{ url("/posts") }}">Retour vers les locations saisonières</a></p>

@endsection