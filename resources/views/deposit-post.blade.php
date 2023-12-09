<title>Déposer une petite annonce sur leboncoin</title>
<link rel="stylesheet" type="text/css" href="{{asset('depositPost.css')}}"/>
<link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>
<link rel="icon" type="image/x-icon" href="https://img.utdstc.com/icon/f01/c30/f01c30e1ae7730771565e60e5b26d888a6a6a49f2112235ba23d30abbc4b4923:200"> 




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
        </br><label id="errorChamp">Le champ titre est obligatoire</label>    
        
        <p id='button' type="input" onclick="handleContinue()">Continuer</p>
        
    </div>
    
    <div id="divCategoryDeposit">
        <div id="divInputCatgory">
            <h3>Dites-nous en plus</h3>
            
            
        </br>
        
        
        <label>Type de logement*</label></br>
        <div>
            
            <form id="searchForm" method="post">
                @csrf
                
                
                <select name="type_hebergement" id="type_hebergement" required>
                    <option value=""></option>
                    @foreach($typeHebergements as $typeHebergement)
                    <option value="{{ $typeHebergement->idhebergement }}">{{ $typeHebergement->libelletypehebergement }}</option>
                    
                    @endforeach
                </select>    
            </br><label id='errorChampType'>Le champ type hébergement est obligatoire</label>                
        </form>
        
    </div>
    
</br>
<label>Capacité*</label></br>
<div>
    <select name="capacite_hebergement" id="capacite_hebergement" required>
        <option value=""></option>
        @foreach( $capacitelogements as $capacitelogement)
        <option value="{{ $capacitelogement->idcapacite }}">{{ $capacitelogement->idcapacite}}</option>
        @endforeach
    </div>
</select>                    
</br><label id="errorChampCapacite">Le champ capacité est obligatoire</label>  
</div>


</br>



<div class="menu_equipement">
    <input type="text" id="inputEquipement" class="dropselect" name="inputEquipement" placeholder="Ajouter un équipement"
    onclick="clickDropdown()"
    reedonly>
</br><label id="errorEquipement">Le champ equipement est obligatoire</label>  
</input>
<div id="divEquipement" class="dropdown-content" name="equipement">
    <div>
        @foreach( $equipements as $equipement)
        <input id='equipement2[]' name ="equipement2[]" type="checkbox" value="{{ $equipement->idequipement }}" onchange="updateSelectedEquipements()">{{ $equipement->libelleequipement}}</input>
        @endforeach
    </div>
    <p></p>
</div>


</div>

</br>

<div class="menu_service">
    
    <input type="text" id="inputService" class="dropselect" name="inputService" placeholder="Ajouter un service"
    onclick="clickDropdown2()"
    readonly >
    <!-- <option value="" disabled selected hidden>Ajouter un service/accessibilité</option> -->
</br><label id="errorService">Le champ service et accessibilité est obligatoire</label>  
</input>  

<div id="divService" class="dropdown-content" name="service" >
    
    @foreach( $serviceaccessibilittes as $serviceaccessibilitte)
    <input type="checkbox" name ="service" value="{{ $serviceaccessibilitte->idservice }}" onchange="updateSelectedServices()">{{ $serviceaccessibilitte->libelleservice}}</input>
    @endforeach
    <p value="labelErrorService.innerText"></p>
</div>

</div>




</br>

<label>Description*</label></br>

<input type="text"  id="add_description" name="description" required></input>  
</br><label id="errorChampDescription">Le champ description est obligatoire</label>    
<p id='button' type="input" onclick="continueForm()">Continuer</p>

</div>

<div id='divAdresse'>
    </br>
    <label>Adresse*</label></br>
    
    <input type="adresse" name="adresse" id="adresse"  required>
    
    <p id='button' type="input" onclick="advancedForm()">Continuer</p>
</br></br><label id="errorChampAdresse">Le champ adresse est obligatoire</label>  
<ul name="completion" id="completion"></ul> 


<input name="numero" id="numero" type="hidden"/>
<input name="rueclient" id="rueclient" type="hidden"/>
<input name="codepostal" id="codepostal" type="hidden"/>
<input name="ville" id="ville" type="hidden"/>
<input name="departement" id="departement" type="hidden" />
<input name="pays" id="pays" type="hidden"/>


</div>


<div id='divPrix'>
    <label>Prix par nuit*</label></br>
    
    <input type="number"  id="add_prix" name="prix_par_nuit"></input>
</br></br><label id="errorPrix">Le champ prix est obligatoire</label>  

</br>
<label>Paiement en ligne</label></br>
<input type="radio"  name="typeres" id="mode_paiement"  value="S" />
<label for="secondaire" >Oui</label>
<input type="radio" name="typeres"  id="mode_paiement" value="P" />
<label for="principale">Non</label>

</br></br><label id="errorPaiement">Le champ prix est obligatoire</label>  


</br>
<button id='button' type="input">Continuer</button>
</div>
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




<script src="/js/deposit-post.js" defer></script>