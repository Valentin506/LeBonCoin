<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('employe.css')}}"/>

<link rel="stylesheet" type="text/css" href="{{asset('dashboard.css')}}"/>
<link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>
<link rel="icon" type="image/x-icon" href="https://img.utdstc.com/icon/f01/c30/f01c30e1ae7730771565e60e5b26d888a6a6a49f2112235ba23d30abbc4b4923:200">   


<body>
    <div class="marginPage">
    <div class="headerDiv">
                    <nav id="headerFunctionalities">
                        <a href="{{url("/")}}"><img class="logo" src="https://www.leboncoin.fr/logos/leboncoin.svg"></a>
                        
                        
                        <div class="buttonMessages">
                            <input type="image" alt="Messages" src="https://cdn-icons-png.flaticon.com/512/685/685887.png"/>
                            <span>Messages</span>
                        </div>

                        <div class="buttonLogin">

                        
                        </div>

                    </nav>

                </div>

        <h1>Dashboard</h1>

        <p>Bienvenue, {{ auth('employe')->user()->nomemploye }} {{ auth('employe')->user()->prenomemploye }}</p>
        <!-- <p>Votre email: {{ auth('employe')->user()->emailemploye }}</p>
        <p>Votre date de naissance: {{ auth('employe')->user()->datenaissanceemploye }}</p> -->

        <div id="categories">
        <div><a href="{{ route('types-hebergements.index') }}">Types d'Hébergements</a></div>



            <div>Equipements</div>


            <div>Paramètres</div>
        </div>


        <form action="{{ route('employe.logout') }}" method="post">
            @csrf
            <button type="submit">Se deconnecter</button>
        </form>


    </div>    



</body>
    
