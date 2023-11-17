<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
        <link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/>   

    </head>


    <body>

    	<header>
    		<!-- <h1>@yield('title')</h1> -->

            <img class="logo" src="https://www.leboncoin.fr/logos/leboncoin.svg">
            <button class="buttonDeposerAnnonce" type="button">+ Déposer une annonce</button>

            <input type="text" class="search" placeholder="Rechercher sur leboncoin" />
            <i class="fa fa-search" aria-hidden="true"></i>
            <!-- <button class="buttonMesRecherches" type="button">Mes Recherches</button> -->
            <!-- <button class="buttonFavoris" type="button">Favoris</button> -->
            <!-- <button class="buttonMessages" type="button">Messages</button> -->
            <!-- <button class="buttonSeConnecter" type="button">Se Connecter</button> -->
            
            
            <nav id="userFunctionalities">
                
                
                <div class="buttonMySearch">
                    <input type="image" alt="Se Connecter" src="https://icons.veryicon.com/png/o/miscellaneous/icon-pack/alarm-37.png"/>
                    <span>Mes recherches</span>
                </div>
                <div class="buttonFavorite">
                    <input type="image" alt="Se Connecter" src="https://freeiconshop.com/wp-content/uploads/edd/heart-outline.png"/>
                    <span>Favoris</span>
                </div>
                <div class="buttonMessages">
                    <input type="image" alt="Se Connecter" src="https://cdn-icons-png.flaticon.com/512/685/685887.png"/>
                    <span>Messages</span>
                </div>
                <div class="buttonSeConnecter">
                    <input type="image" alt="Se Connecter" src="https://icons.veryicon.com/png/o/internet--web/prejudice/user-128.png"/>
                    <span>Se connecter</span>
                </div>
            </nav>


            <ul class="nav">
            <li>Immobilier</li>
            <li>•</li>
            <li>Véhicules</li>
            <li>•</li>
            <li>Locations de vacances</li>
            <li>•</li>
            <li>Emploi</li>
            <li>•</li>
            <li>Mode</li>
            <li>•</li>
            <li>Maison & Jardin</li>
            <li>•</li>
            <li>Famille</li>
            <li>•</li>
            <li>Électronique</li>
            <li>•</li>
            <li>Loisirs</li>
            <li>•</li>
            <li>Autres</li>
            </ul>
   




    	</header>

        @section('nav')
            <ul>
                <li><a href="{{ url("/") }}">Accueil</a></li>
                <li><a href="{{url("/create-account")}}">Créer compte</a></li>
                <li><a href="{{url("/view-profile")}}">Profil de</a></li>
            </ul>
        @show

        <div class="container">
            @yield('content')
        </div>

        <header>

    

    <button class="buttonSauvegardeRecherche" type="button">Sauvegarder la recherche</button>



    </body>
</html>