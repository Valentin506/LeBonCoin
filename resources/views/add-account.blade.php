
<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<!-- Formulaire pour les inscriptions -->


<h2> Créez votre compte</h2>



<form action="{{ url("/User/create") }}" method="post">
    @csrf

    <div>
        <input type="radio" name="radio">
        <label for="radio">Pour vous *</label>
    </div>

    <div>
        <input type="radio" name="radio">
        <label for="radio">Pour votre entreprise</label>
    </div>

    <div>
        <input type="email" name="email">
        <label for="email">Email</label>
    </div>

    <div>
        <input type="password" name="password">
        <label for="password">Mot de Passe</label>
    </div>


    <div>
        <input type="tel" name="tel" >
        <label for="tel">Numéro de téléphone</label>
    </div>

    <div>
        <input type="name" name="name">
        <label for="name">Nom</label>

        <input type="firstname" name="firstname">
        <label for="firstname">Prénom</label>
    </div>


    <div>
        <input type="date" name="date">
        <label for="date">Date de naissance</label>
    </div>
    <div>
        <input type="adress" name="adress">
        <label for="tel">Adresse </label>

        <input type="ville" name="ville">
        <label for="tvilleel">Ville ou code postal </label>
    </div>

    <div>
        <button>S'inscrire</button>
    </div>
</form>