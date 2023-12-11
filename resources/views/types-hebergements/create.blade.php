<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('employe.css')}}"/>

<link rel="stylesheet" type="text/css" href="{{asset('dashboard.css')}}"/>
<link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>


<h2>Ajouter un Nouveau Type d'Hébergement</h2>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ url("/types-hebergements/store") }}" method="post" class="form">
    @csrf
    <label for="libelletypehebergement">Nom du Type d'Hébergement :</label>
    <input type="text" name="libelletypehebergement" required>

    <button type="submit">Ajouter</button>
</form>