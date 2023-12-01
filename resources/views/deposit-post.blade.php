<title>Déposer une petite annonce sur leboncoin</title>
<link rel="stylesheet" type="text/css" href="{{asset('depositPost.css')}}"/>
<link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>
<link rel="icon" type="image/x-icon" href="https://img.utdstc.com/icon/f01/c30/f01c30e1ae7730771565e60e5b26d888a6a6a49f2112235ba23d30abbc4b4923:200"> 

<script src="/js/deposit-post.js"></script>



<header>
    <nav class="headerNav">
        <div id="divImgLogo">
            <a href="{{url("/")}}"><img class="logo" src="https://www.leboncoin.fr/logos/leboncoin.svg"></a>
        </div>
        <div id="divDepositText">
            <span>Déposer une annonce</span>
        </div>
        <div id="divQuitButton">
            <a href="{{url("/")}}"><button>Quitter</button></a>
        </div>
    </nav>
</header>



@section('content')
<div>
    <div>
        <h3>Commeçons par l'essentiel !</h3>
        <label for="inputTitlePost">Quel est le titre de l'annonce ? *</label>
        <div id="divTitlePost">
            <input type="input" id="inputTitlePost" required></input>
            <button type="input" onclick="showCategoryDeposit()">Continuer</button>
        </div>
        <div id="divCategoryDeposit">
            <div id="divInputCatgory">
                <h3>Locations saisonnières</h3>

                <label>Dites-nous en plus</label></br>
                </br>

                <div>
                    <label>Type de résidence*</label></br>
                    </br>
                    <input type="radio"  name="typeres" id="secondaire"  value="S" />
                    <label for="secondaire" >Secondaire</label>
                    <input type="radio" name="typeres"  id="principale" value="P" />
                    <label for="principale">Principale</label>
                    <input type="radio" name="typeres"  id="nonres" value="NR"/>
                    <label for="nonres">Non résidentielutre</label></br>
                    </br>
                </div>

                <label>Type de logement</label></br>
                <div>

                    <form id="searchForm" method="post">
                    @csrf
                        
                    
                    <select name="type_hebergement" id="type_hebergement">
                        <option value=""></option>

                        @foreach($typeHebergements as $typeHebergement)
                            <option value="{{ $typeHebergement->idhebergement }}">{{ $typeHebergement->libelletypehebergement }}</option>
                        @endforeach
                    </select>                    
                    </form>

                </div>

                </br>
                <label>Capacité*</label></br>
                <div>
                        <select name="capacite_hebergement" id="capacite_hebergement">
                            <option value=""></option>
                                @foreach( $capacitelogements as $capacitelogement)
                                    <option value="{{ $capacitelogement->idcapacite }}">{{ $capacitelogement->idcapacite}}</option>
                                @endforeach
                            </div>
                        </select>                    
                        
                </div>
                

                </br>
                <label>Equipements</label></br>
                <div>
                    <form id="searchForm" method="post">
                        @csrf
                            
                        
                        <select name="equipement" id="equipement">
                            <option value=""></option>
                                    @foreach( $equipements as $equipement)
                                        <option value="{{ $equipement->idequipement }}">{{ $equipement->libelleequipement}}</option>
                                    @endforeach
                            </select>                    
                        </form>
                </div>
                </br>

                <div class="menu_equipement">
                        <select type="text" id="inputEquipement" class="dropselect" name="inputEquipement" placeholder="Ajouter un équipement"
                        onclick="clickDropdown()"
                        required>
                        
                            <div id="divEquipement" class="dropdown-content">
                                @foreach( $equipements as $equipement)
                                    <input type="checkbox" value="{{ $equipement->idequipement }}">{{ $equipement->libelleequipement}}</input>
                                @endforeach
                            </div>
                        </select>
                        
                </div>

                <label>Services et accessibilité</label></br>
                <div>
                    <form id="searchForm" method="post">
                        @csrf
                            
                        
                        <select name="services_accessibilites" id="service_accessibilites">
                            <option value=""></option>

                            @foreach( $serviceaccessibilittes as $serviceaccessibilitte)
                                <option value="{{ $serviceaccessibilitte->idservice }}">{{ $serviceaccessibilitte->libelleservice}}</option>
                            @endforeach
                        </select>                    
                        </form>
                </div>

                
            </div>
            

                

        </div>
        

    </div>
    <div>

    </div>
</div>

<div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>

</div>
<div>
    
</div>





