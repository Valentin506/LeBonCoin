<link rel="stylesheet" type="text/css" href="{{asset('post.css')}}"/> 

@extends('layouts.app')

@section('title', 'Leboncoin')


@section('content')

<div class="postDiv">
        <h2>{{ $post -> titreannonce }}</h2>
        <ul class="elementsDescription">
                <li>{{ $post -> idhebergement }}</li>
                <li>•</li>
                <li>{{ $post -> idcapacite }}</li>
                <li>•</li>
                <li>{{ $post -> idadresse }}</li>
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
                <h3><a href="{{ url("/profile/".$owner->idproprietaire )}}">{{ $owner-> idproprietaire}}</a></h3>

        </div>

</div>



<p><a href="{{ url("/posts") }}">Retour vers les locations saisonières</a></p>

@endsection