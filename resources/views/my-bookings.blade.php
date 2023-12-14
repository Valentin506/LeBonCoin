
@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{asset('post.css')}}"/> 

@section('title', 'Leboncoin')



@section('content')

<h2>Mes réservations en tant que voyageur</h2>

@foreach($bookings as $booking)
    <div class="booking-details">
        <p>Réservation ID: {{ $booking->idfiche }}</p>
        <p>Adultes: {{ $booking->nbadulte}}</p>
        <p>Enfants: {{ $booking->nbenfant}}</p>
        <p>Bébés: {{ $booking->nbbebe}}</p>
        <p>Animaux: {{ $booking->nbanimaux}}</p>
       


        @foreach($ress->where('idfiche', $booking->idfiche) as $res)
            <div class="booking-details">
                <p>Annonce n°: {{ $res->idannonce }}</p>
                <!-- Autres détails spécifiques à la réservation si nécessaire -->
            </div>
        @endforeach


      
    </div>
@endforeach
           
        </div>

    


@endsection