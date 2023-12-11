<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('employe.css')}}"/>

<link rel="stylesheet" type="text/css" href="{{asset('dashboard.css')}}"/>
<link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>

<h1>Tous les Types d'Hébergements</h1>

<ul>
    @foreach ($typesHebergements as $typeHebergement)
        <li>{{ $typeHebergement->libelletypehebergement }}</li>
    @endforeach
</ul>


<a href="{{ route('types-hebergements.create') }}">Ajouter un nouveau type d'hébergement</a>

<a id="buttonPostDeposit" href="{{ route('employe.dashboard') }}">Retour vers page d'acceuil</a>