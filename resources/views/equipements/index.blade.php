<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('employe.css')}}"/>

<link rel="stylesheet" type="text/css" href="{{asset('dashboard.css')}}"/>
<link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>

<h1>Tous les équipements</h1>

<ul>
    @foreach ($equipements as $equipement)
        <li>{{ $equipement->libelleequipement }}</li>
    @endforeach
</ul>


<a href="{{ route('equipements.create') }}">Ajouter un nouvel équipement</a>

<a id="buttonPostDeposit" href="{{ route('employe.dashboard') }}">Retour vers page d'acceuil</a>