
@extends('layouts.app')

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
            
            <!-- Ajoutez d'autres détails selon votre structure de données -->
        </div>
    @endforeach

    


@endsection