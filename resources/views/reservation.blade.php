@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{asset('post.css')}}"/> 

@section('content')




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
    <div>Adultes <br><p>18 ans et plus</p><div class="nbPersonne"><input type="button" value="+"><input type="button" value="-"></div></div>
    <div>Enfants<br> <p>3 à 17 ans</p><div class="nbPersonne"></div></div>
    <div>Bébés<br><p>Moins de 3 ans</p><div class="nbPersonne"></div></div>
    <div>Animaux<div class="nbPersonne"></div></div>
</div>
<hr>
</div>

@endsection