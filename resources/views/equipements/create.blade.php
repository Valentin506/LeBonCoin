<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('employe.css')}}"/>

<link rel="stylesheet" type="text/css" href="{{asset('dashboard.css')}}"/>
<link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>


<h2>Ajouter un Nouvel Equipement</h2>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ url("/equipements/store") }}" method="post" class="form">
    @csrf
    <label for="libelleequipement">Nom de l'equipement :</label>
    <input type="text" name="libelleequipement" required>

    <button type="submit">Ajouter</button>
</form>