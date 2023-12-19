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
        <input type="number" name="adultes" value="0" required min="0" max="{{ $post->capaciteLogement->nombrepersonne }}">
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
    <input type="text" name="carte" id="carte" maxlength="16" oninput="updateCard()" >
    

</div>
<div class="Infosbancaire">
    <label for="">CVV</label>
    <input type="text" name="cvv" maxlength="3">
</div>
<div class="Infosbancaire">
    <label for="">Date d'expiration</label>
    <input type="month" name="dateexpiration">
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

<h3>Vos Informations</h3>
<div>
    <div><label for="Prénom">Prénom<input type="text" name="prenom"></label></div>
    <div><label for="Nom">Nom<input type="text" name="nom"></label></div>
    <div><label for="telephone">Numéro de téléphone<input type="tel" name="telephone"></label></div>
</div>

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