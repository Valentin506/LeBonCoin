@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{asset('post.css')}}"/> 

@section('content')



<div id="page">
<div class="reservation">

<div>
    <H1>Votre réservation</H1>
</div>
<hr>
    <h3>Vos dates de séjour</h3>

   
        <p>Arrivé </p>
       
    
   
        <p>Départ </p>
        
    

<hr>


<h3>Nombre de voyageurs</h3>
<div class="personne">
    <div>
        Adultes <br>
        <p>18 ans et plus</p>
        <div class="nbPersonne">
            <input type="button" value="-" onclick="decrement(this, 'adultes')">
            <span id="adultesCount">0</span>
            <input type="button" value="+" onclick="increment(this, 'adultes')">
        </div>
    </div>
    <div>
        Enfants<br>
        <p>3 à 17 ans</p>
        <div class="nbPersonne">
            <input type="button" value="-" onclick="decrement(this, 'enfants')">
            <span id="enfantsCount">0</span>
            <input type="button" value="+" onclick="increment(this, 'enfants')">
        </div>
    </div>
    <div>
        Bébés<br>
        <p>Moins de 3 ans</p>
        <div class="nbPersonne">
            <input type="button" value="-" onclick="decrement(this, 'bebes')">
            <span id="bebesCount">0</span>
            <input type="button" value="+" onclick="increment(this, 'bebes')">
        </div>
    </div>
    <div>
        Animaux
        <div class="nbPersonne">
            <input type="button" value="-" onclick="decrement(this, 'animaux')">
            <span id="animauxCount">0</span>
            <input type="button" value="+" onclick="increment(this, 'animaux')">
        </div>
    </div>
</div>
<hr>

<h3>Vos Informations </h3>
<div>
<div><label for="Prénom">Prénom<input type="text"></label></div>
<div><label for="Nom">Nom<input type="text"></label></div>
<div><label for="telephone">Numéro de téléphone<input type="tel"></label></div>
</div>
@php $hasUser=false; @endphp
@foreach($posts as $post)
<hr>
<h3>Envoyer un message à {{ $post -> owner->user->pseudocompte}}</h3>
@php $hasUser=true; break; @endphp
@endforeach

<input type="text" class="description" placeholder="Dites quelque chose à votre hôte">
</div>

<div id="info">

                @foreach ($posts as $post)
                    @if($post -> idproprietaire === $owner->idproprietaire)
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
                    @endif
                @endforeach
                    
                
</div>

</div>







<script>
    var totalPersons = 0;
    var maxPersons = 12;

    function increment(button, type) {
        var span = button.parentNode.querySelector('span');
        var count = parseInt(span.textContent) + 1;

        if (totalPersons < maxPersons) {
            totalPersons++;
            span.textContent = count;
            updateTotalCount();
        }
    }

    function decrement(button, type) {
        var span = button.parentNode.querySelector('span');
        var count = parseInt(span.textContent) - 1;

        if (count >= 0) {
            totalPersons--;
            span.textContent = count;
            updateTotalCount();
        }
    }

    function updateTotalCount() {
        document.getElementById('totalCount').textContent = totalPersons;
    }
</script>

@endsection