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
    <form action="{{url("/deposit-post/save") }}" method="post" class="form">
        <div id="form">
        
                
            <h3>Commeçons par l'essentiel !</h3>
            <label for="inputTitlePost">Quel est le titre de l'annonce ? *</label>
            <div id="divTitlePost">
                <input type="text" id="title" name="title" required></input>
                <button type="input" onclick="showCategoryDeposit()">Continuer</button>
            </div>
            <div id="divCategoryDeposit">
                <div id="divInputCatgory">
                    <h3>Dites-nous en plus</h3>

                    
                    </br>


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

                    <!-- <label>Equipements</label></br>
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
                    </div> -->
                    
                    </br>

                    <div class="menu_equipement">
                            <input type="text" id="inputEquipement" class="dropselect" name="inputEquipement" placeholder="Ajouter un équipement"
                            onclick="clickDropdown()"
                            reedonly>
                                
                            </input>
                                <div id="divEquipement" class="dropdown-content" >
                                    <div>
                                        @foreach( $equipements as $equipement)
                                            <input type="checkbox" value="{{ $equipement->idequipement }}">{{ $equipement->libelleequipement}}</input>
                                        @endforeach
                                    </div>
                                </div>
                            
                            
                    </div>

                    </br>

                    <div class="menu_service">
                        
                            <input type="text" id="inputService" class="dropselect" name="inputService" placeholder="Ajouter un service"
                                    onclick="clickDropdown2()"
                                    readonly>
                                    <!-- <option value="" disabled selected hidden>Ajouter un service/accessibilité</option> -->
                            </input>  
                            
                                <div id="divService" class="dropdown-content" >
                                    @foreach( $serviceaccessibilittes as $serviceaccessibilitte)
                                        <input type="checkbox" value="{{ $serviceaccessibilitte->idservice }}">{{ $serviceaccessibilitte->libelleservice}}</input>
                                    @endforeach

                                </div>
                    </div>

                    
                </div>
                
                </br>

                <label>Description</label></br>

                <input type="text"  id="add_description" name="description"></input>

                
                </br>
                <label>Adresse</label></br>
    
                <input type="adresse" name="adresse" id="adresse"  required>
                <ul name="completion" id="completion"></ul> 

                <input name="numero" id="numero" type="hidden"/>
                <input name="rueclient" id="rueclient" type="hidden"/>
                <input name="codepostal" id="codepostal" type="hidden"/>
                <input name="ville" id="ville" type="hidden"/>
                <input name="departement" id="departement" type="hidden" />
                <input name="pays" id="pays" type="hidden"/>

                </br>
                <label>Mode de paiement</label></br>
                    <input type="radio"  name="typeres" id="mode_paiement"  value="S" />
                        <label for="secondaire" >Paiement en ligne</label>
                    <input type="radio" name="typeres"  id="mode_paiement" value="P" />
                        <label for="principale">Paiement en main propre</label>

                </br>
                <button type="input" onclick="showDescriptionDeposit()">Continuer</button>
        </div>
    </form>


            


        

        
        

    </div>
   
</div>

<script>

                const form = document.querySelector("#form")

                const adresseInput = document.querySelector("#adresse")
                const completionSelect = document.querySelector("#completion")

                adresseInput.addEventListener("keyup", event => {

                    if (adresseInput.value.length > 4) {
                        fetch("https://api-adresse.data.gouv.fr/search/?q="+adresseInput.value)
                            .then(response => response.json())
                            .then(data => {
                                completionSelect.querySelectorAll("li").forEach(option => option.remove())
                                data.features.forEach( feature =>  {
                                    let option = document.createElement("li")
                                    completionSelect.appendChild(option)
                                    option.innerHTML = feature.properties.label
                                    option.addEventListener("click", e => {
                                        form.querySelector("#numero").value =  feature.properties.housenumber
                                        form.querySelector("#rueclient").value =  feature.properties.street
                                        form.querySelector("#codepostal").value = feature.properties.postcode
                                        form.querySelector("#ville").value =  feature.properties.city
                                        form.querySelector("#departement").value =  feature.properties.postcode
                                        form.querySelector("#pays").value = "France" // :wink:
                                        completionSelect.querySelectorAll("li").forEach(option => option.remove())
                                        adresseInput.value = feature.properties.label
                                    
                                    })
                                })    
                            })

                    }

                })


            </script>








