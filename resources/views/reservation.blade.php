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

<form action="{{url("/fiche-reservation/save") }}" method="post">
@csrf
<h3>Nombre de voyageurs</h3>
<div class="personne">
    <div>
        Adultes <br>
        <p>18 ans et plus</p>
        <div class="nbPersonne">
            <input type="button" value="-" onclick="decrement(this, 'adultes')">
            <input type="integer" name="adultes" value="-">
            <input type="button" value="+" onclick="increment(this, 'adultes')">
            
        </div>
    </div>
    <div>
        Enfants<br>
        <p>3 à 17 ans</p>
        <div class="nbPersonne">
            <input type="button" value="-" onclick="decrement(this, 'enfants')">
            <input type="integer" name="enfants" value="-">
            <input type="button" value="+" onclick="increment(this, 'enfants')">
            
        </div>
    </div>
    <div>
        Bébés<br>
        <p>Moins de 3 ans</p>
        <div class="nbPersonne">
            <input type="button" value="-" onclick="decrement(this, 'bebes')">
            <input type="integer" name="bebes" value="-">
            <input type="button" value="+" onclick="increment(this, 'bebes')">
            
        </div>
    </div>
    <div>
        Animaux
        <div class="nbPersonne">
            <input type="button" value="-" onclick="decrement(this, 'animaux')">
            <input type="integer" name="animaux" value="-">
            <input type="button" value="+" onclick="increment(this, 'animaux')">

            
        </div>
    </div>
</div>

<div>
        Infos bancaires
        <div class="Infosbancaire">
            <input type="integer" name="carte">
        </div>
        <div class="Infosbancaire">
            <input type="integer" name="cvv">
        </div>
        <div class="Infosbancaire">
            <input type="month" name="dateexpiration">
        </div>
    </div>
</div>

<div><input type="submit" value="Résever"></div>
</form>
<hr>

<h3>Vos Informations</h3>
<div>
    <div><label for="Prénom">Prénom<input type="text" name="prenom"></label></div>
    <div><label for="Nom">Nom<input type="text" name="nom"></label></div>
    <div><label for="telephone">Numéro de téléphone<input type="tel" name="telephone"></label></div>
</div>

<!-- @if($posts && $posts->count() > 0)
    @foreach($posts as $post)
        <h3>Envoyer un message à {{ $post->owner->user->pseudocompte }}</h3>
    @endforeach
@else
    <p>Aucun message trouvé.</p>
@endif

<input type="text" class="description" placeholder="Dites quelque chose à votre hôte">

<div id="info">
    @foreach ($posts as $post)
        @if($post->idproprietaire === $owner->idproprietaire)
            <div class="divForEachPost">
                <div>
                    <h3><a href="{{ url("/post/".$post->idannonce) }}">{{ $post->titreannonce}}</a></h3>
                </div>
                @php $hasPhoto = false; @endphp
                @foreach ($photoPosts as $photoPost)
                    @if($photoPost->idannonce === $post->idannonce)
                        <div id="divImagePost">
                            <img src="{{ $photoPost->image }}" alt="Image de l'annonce">
                            @php $hasPhoto = true; break; @endphp
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    @endforeach -->
</div>







<script>
        function increment(button, inputName) {
            var inputElement = document.getElementsByName(inputName)[0];
            var currentValue = parseInt(inputElement.value, 10) || 0;
            inputElement.value = currentValue + 1;
        }

        function decrement(button, inputName) {
            var inputElement = document.getElementsByName(inputName)[0];
            var currentValue = parseInt(inputElement.value, 10) || 0;
            if (currentValue > 0) {
                inputElement.value = currentValue - 1;
            }
        }
    </script>

@endsection