@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{asset('post.css')}}"/> 

@section('content')


<div id="page" style="display: flex; justify-content: space-between;">
<div class="reservation">

<div>
    <H1>Votre réservation</H1>
</div>
<hr>
    <!-- <h3>Vos dates de séjour</h3> -->

   
        <!-- <p>Arrivé {{$calendar->periodedebut}}</p>
       
    
   
        <p>Départ {{$calendar->periodefin}} </p>
        
        -->
<hr>
<div>
                   
                        
                                <div><p>Capacité logement </p>{{ $post -> capaciteLogement -> nombrepersonne }}</div>
                                

<form action="{{url("/fiche-reservation/".$post->idannonce."/save") }}" method="post">
@csrf
<h3>Nombre de voyageurs</h3>
<div class="personne">
    
<div>
    Adultes <br>
    <p>18 ans et plus</p>
    <div class="nbPersonne">
        <input type="button" value="-" onclick="decrement('adultes')">
        <input type="number" name="adultes" value="0" required min="1" max="{{ $post->capaciteLogement->nombrepersonne }}">
        <input type="button" value="+" onclick="increment('adultes')">
    </div>
</div>
<div>
    Enfants<br>
    <p>3 à 17 ans</p>
    <div class="nbPersonne">
        <input type="button" class="button" value="-" onclick="decrement('enfants')">
        <input type="number" name="enfants" value="0" required min="0" max="{{ $post->capaciteLogement->nombrepersonne }}">
        <input type="button" class="button" value="+" onclick="increment('enfants')">
    </div>
</div>
<div>
    Bébés<br>
    <p>Moins de 3 ans</p>
    <div class="nbPersonne">
        <input type="button" value="-" onclick="decrement('bebes')">
        <input type="number" name="bebes" value="0" min="0" max="{{ $post->capaciteLogement->nombrepersonne }}">
        <input type="button" value="+" onclick="increment('bebes')">
    </div>
</div>
<div>
    Animaux
    <div class="nbPersonne">
        <input type="button" value="-" onclick="decrement('animaux')">
        <input type="number" name="animaux" value="0" min="0" max="{{ $post->capaciteLogement->nombrepersonne }}">
        <input type="button" value="+" onclick="increment('animaux')">
    </div>
</div>

<div id="infobancaire">
        Infos bancaires
        <div class="Infosbancaire">
    <label for="">Numero de carte</label>
    <input type="numeric" name="carte" id="carte" minlength="16" maxlength="16" oninput="updateCard()" required>
    

</div>

<div class="Infosbancaire">
    <label for="">CVV</label>
    <input type="numeric" name="cvv" minlength="3" maxlength="3" id="carte" required>
</div>
<div class="Infosbancaire">
    <label for="">Date d'expiration</label>
    <input type="month" name="dateexpiration" id="carte" required>
    @if($errors->has('dateexpiration'))
            <p class="text-danger">{{ $errors->first('dateexpiration') }}</p>
        @endif
</div>


        
    </div>
</div>
<!-- <div class="card-container">
  <div id="card">

  </div> -->
</div>

<label>
        <input type="checkbox" name="enregistrerDonneesBancaires" value="1">
        Enregistrer mes données bancaires
    </label>

<div><input type="submit" id="buttonPostDeposit" value="Payer et valider ma réservation"></div>
</form>
<hr>



</div >

       
<div style="float: right; width: 30%;" id="prix">
@php
            $dateDebut = new DateTime($calendar->periodedebut);
            $dateFin = new DateTime($calendar->periodefin);
            $difference = $dateDebut->diff($dateFin);
            $nombreDeJours = $difference->days;
            $prix = $post->prix;
            $montantTotal = $nombreDeJours * $prix;
        @endphp

<p>Nombre de jours : {{$nombreDeJours}} jours</p>
<p>Prix par jour : {{$prix}} €</p>
<p>Montant total : {{$montantTotal}} €</p>
</div>

<script>
    function increment(type) {
        var inputField = document.querySelector(`input[name="${type}"]`);
        var maxCapacity = {{ $post->capaciteLogement->nombrepersonne }};
        var remainingCapacity = maxCapacity - parseInt(document.querySelector('input[name="adultes"]').value);

        // Vérifier si la capacité restante est positive
        if (remainingCapacity > 0) {
            var suggestedValue = Math.min(parseInt(inputField.value) + 1, remainingCapacity);
            inputField.value = suggestedValue;
        }
    }

    function decrement(type) {
        var inputField = document.querySelector(`input[name="${type}"]`);
        var value = parseInt(inputField.value, 10);
        if (value > 0) {
            inputField.value = value - 1;
        }
    }
</script>
@endsection