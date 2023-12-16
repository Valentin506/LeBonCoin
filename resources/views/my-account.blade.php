

<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<link rel="stylesheet" type="text/css" href="{{asset('profile.css')}}"/> 
<!-- Formulaire pour les inscriptions -->


<div class="marginViewProfile">
    @extends('layouts.app')
    
    @section('content')
    
    <div >
        <div >
            
            <div id=boxUserName>
                @if (Str::startsWith($user->photoUser->urlphotoprofil, 'https'))
                    <img id="photoUser" src="{{ $user->photoUser->urlphotoprofil }}" alt="photo utilisateurs">
                @else
                    
                    <img id="photoUser" src="/images/{{ $user->photoUser->urlphotoprofil }}" alt="Photo de profil">
                @endif

                <!-- <img id="photoUser" src="/images/{{$user->photoUser->urlphotoprofil}}" alt="Photo de profil"> -->
                <h3>{{$user-> pseudocompte}}</h3>
                <!-- <a href="{{ url("/profile/".$user->idcompte) }}">Accéder à mon profil public</a> -->
            </div>

            <div class="tableUser">
                <a class="boxTableUser" href="{{ url("/account/{$user->idcompte}/my-posts")}}">
                    <div class="boxLogo">
                        <img src="https://www.leboncoin.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fannonces.93fc573d.png&w=48&q=75" alt="Logo annonce">
                    </div>
                    <div>
                        <h2>Annonces</h2>
                        <p>Gérer mes annonces déposées</p>
                    </div>
            
                </a>
                <a class="boxTableUser" href="{{ url("/account/{$user->idcompte}/my-transactions")}}">
                    <div class="boxLogo">
                        <img src="https://www.leboncoin.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fachats-ventes.759b3481.png&w=48&q=75" alt="Logo transactions">
                    </div>
                    <div>
                        <h2>Transactions</h2>
                        <p>Suivre mes achats et mes ventes</p>
                    </div></a>
                <a class="boxTableUser" href="{{ url("/account/{$user->idcompte}/my-bookings")}}">
                    <div class="boxLogo">
                        <img src="https://www.leboncoin.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fvacances.60813a86.png&w=48&q=75" alt="Logo vacances">
                    </div>
                    <div>
                        <h2>Réservation de vacances</h2>
                        <p>Retrouver vos réservations en tant que voyageur</p>
                    </div></a>
                <a class="boxTableUser" href="{{ url("/account/{$user->idcompte}/modif-profile")}}">
                    <div class="boxLogo">
                        <img src="https://www.leboncoin.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprivate-profile.ccf8698a.png&w=48&q=75" alt="Logo profil">
                    </div>
                    <div>
                        <h2>Profil & Espaces</h2>
                        <p>Modifier mon profil public et accéder à mes avis</p>
                    </div></a>
                <a class="boxTableUser" href="{{ url("/account/{$user->idcompte}/modif-account")}}">
                    <div class="boxLogo">
                        <img src="https://www.leboncoin.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fparametres.74750762.png&w=48&q=75" alt="Logo parametres">
                    </div>
                    <div>
                        <h2>Paramètres</h2>
                        <p>Compléter et modifier mes informations privées et préférences</p>
                    </div></a>
                <a class="boxTableUser" href="{{ url("/account/{$user->idcompte}/modif-securite")}}">
                    <div class="boxLogo">
                        <img src="https://www.leboncoin.fr/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fsecurite.288e30ea.png&w=48&q=75" alt="Logo parametres">
                    </div>
                    <div>
                        <h2>Connexion et sécurité</h2>
                        <p>Protéger mon compte et consulter son indice de sécurité</p>

                    </div></a>

            </div>

            <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button  id="buttonPostDeposit" type="submit">Déconnexion</button>
</form>

           
        </div>
    
    </div>
    
    @endsection

</div>
