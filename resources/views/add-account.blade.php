
<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<!-- Formulaire pour les inscriptions -->



<form method="post" id="formulaire">
<div id="account">
<div class="form-login">
<h1>Créez un compte</h1>
<p>Bénéficiez d’une expérience personnalisée avec du contenu en lien avec votre activité et vos centres d’intérêt sur notre service.</p>
<div>
<input type="radio" id="personnel" name="typeAccount" value="personnel"/>
<label for="personnel">Pour vous * </label>
</div>

<div>
<input type="radio" id="entreprise" name="typeAccount" value="entreprise" />
<label for="entreprise">Pour votre entreprise</label>
</div><br>
<p>Vous avez deja un compte ?<a href="">Me connecter</a></p> 

<div class="separation"></div>

<p>* Vous agissez à titre professionnel ?<a href="">Créez plutôt un compte pro !</a></p>

<p class="petit">À défaut, en application de l’article L 132-2 du Code de la consommation qui sanctionne les pratiques commerciales trompeuses, vous encourez une peine d’emprisonnement de 2 ans et une amende de 300 000 euros.</p>
</div>



<div class="form-register">
<h1>Bonjour !</h1>
<p>Connectez-vous pour découvrir toutes nos fonctionnalités.</p>
<div>
<input type="email" id="email"/>
<label for="email">Email</label>
</div>

<div>
<input type="password" id="password" />
<label for="password">Mot de Passe</label>
</div><br>
<p><a href="">Mot de passe oublié</a></p> 

<input type="button" value=" Se connecter ">

<p class="petit">À défaut, en application de l’article L 132-2 du Code de la consommation qui sanctionne les pratiques commerciales trompeuses, vous encourez une peine d’emprisonnement de 2 ans et une amende de 300 000 euros.</p>
</div>

</div>

@csrf
</form>