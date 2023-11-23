<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
        <link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/>
        <link rel="icon" type="image/x-icon" href="https://img.utdstc.com/icon/f01/c30/f01c30e1ae7730771565e60e5b26d888a6a6a49f2112235ba23d30abbc4b4923:200">   

    </head>


    <body>

        <div class="marginPage">
            <header>
                <!-- <h1>@yield('title')</h1> -->

                <div class="headerDiv">
                    <nav id="headerFunctionalities">
                        <a href="{{url("/")}}"><img class="logo" src="https://www.leboncoin.fr/logos/leboncoin.svg"></a>
                        
                        <button id="buttonPostDeposit" type="button">+ Déposer une annonce</button>
            
                        <input type="text" id="search" placeholder="Rechercher sur leboncoin" />
                        <i class="fa fa-search" aria-hidden="true"></i>
                        
                        <div class="buttonMySearch">
                            <input type="image" alt="Mes recherches" src="https://icons.veryicon.com/png/o/miscellaneous/icon-pack/alarm-37.png"/>
                            <span>Mes recherches</span>
                        </div>
                        <div class="buttonFavorite">
                            <input type="image" alt="Favoris" src="https://freeiconshop.com/wp-content/uploads/edd/heart-outline.png"/>
                            <span>Favoris</span>
                        </div>
                        <div class="buttonMessages">
                            
                            <input type="image" alt="Messages" src="https://cdn-icons-png.flaticon.com/512/685/685887.png"/>
                            <span>Messages</span>
                        </div>
                        <div class="buttonLogin">

                        @if (Auth::check())
                            <a href="{{ url("/account/".Auth::user()->idcompte) }}"><input type="image" alt="Mon compte" src="https://icons.veryicon.com/png/o/internet--web/prejudice/user-128.png"></a>   
                            <span>Mon compte</span>
                        @else        
                            <!-- <label>{{ session('user_authenticated') ? 'Connecté' : 'Se connecter' }}</label> -->
                            <a href="{{url("/login")}}"><input type="image" alt="Se Connecter" src="https://icons.veryicon.com/png/o/internet--web/prejudice/user-128.png"></a>            
                            <span>Se connecter</span>
                        @endif
                        </div>

                    </nav>


                    <ul class="nav">
                        <li class="category">Immobilier</li>
                        <li>•</li>
                        <li class="category">Véhicules</li>
                        <li>•</li>
                        <li class="category"><a href="{{url("/posts")}}">Locations de vacances</a></li>
                        <li>•</li>
                        <li class="category">Emploi</li>
                        <li>•</li>
                        <li class="category">Mode</li>
                        <li>•</li>
                        <li class="category">Maison & Jardin</li>
                        <li>•</li>
                        <li class="category">Famille</li>
                        <li>•</li>
                        <li class="category">Électronique</li>
                        <li>•</li>
                        <li class="category">Loisirs</li>
                        <li>•</li>
                        <li class="category">Autres</li>
                    </ul>
                </div>

                <div class="headerBorder"></div>
                        
            </header>

            <!-- @section('nav')
                <ul>
                    <li><a href="{{ url("/") }}">Accueil</a></li>
                    <li><a href="{{url("/create-account")}}">Créer compte</a></li>
                    <li><a href="{{url("/view-profile")}}">Profil de</a></li>
                </ul>
            @show -->

            <div class="container">
                @yield('content')
            </div>

            

        

            <!-- <button class="buttonSaveSearch" type="button">Sauvegarder la recherche</button> -->
        </div>

    	



    </body>
</html>