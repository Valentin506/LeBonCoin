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
            <input type="button" value="-" onclick="decrement(this, 'adultes')">
            <input type="integer" name="adultes" value="0" required>
            <input type="button" value="+" onclick="increment(this, 'adultes',8)">
            
        </div>
    </div>
    <div>
        Enfants<br>
        <p>3 à 17 ans</p>
        <div class="nbPersonne">
            <input type="button" class="button" value="-" onclick="decrement(this, 'enfants')">
            <input type="integer" name="enfants" value="0" required>
            <input type="button" class="button" value="+" onclick="increment(this, 'enfants',8)">
            
        </div>
    </div>
    <div>
        Bébés<br>
        <p>Moins de 3 ans</p>
        <div class="nbPersonne">
            <input type="button" value="-" onclick="decrement(this, 'bebes')">
            <input type="integer" name="bebes" value="0">
            <input type="button" value="+" onclick="increment(this, 'bebes',4)">
            
        </div>
    </div>
    <div>
        Animaux
        <div class="nbPersonne">
            <input type="button" value="-" onclick="decrement(this, 'animaux')">
            <input type="integer" name="animaux" value="0">
            <input type="button" value="+" onclick="increment(this, 'animaux',4)">

            
        </div>
    </div>
</div>

<div>
        Infos bancaires
        <div class="Infosbancaire">
        <label for="">Numero de carte</label>
            <input type="integer" name="carte" maxlength="16" >
        </div>
        <div class="Infosbancaire">
        <label for="">CVV</label>
            <input type="integer" name="cvv" maxlength="3">
        </div>
        <div class="Infosbancaire">
            <label for="">Date d'expiration</label>
            <input type="month" name="dateexpiration">
        </div>

        
    </div>
</div>
<div class="card-container">
  <div class="card">

  </div>
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