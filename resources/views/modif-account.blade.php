
<link rel="stylesheet" type="text/css" href="{{asset('profile.css')}}"/> 
<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<!-- Formulaire pour les inscriptions -->

<div class="marginViewProfile">
    @extends('layouts.app')
    
    @section('content')

<form action="{{url("/modif-account/updateAccount") }}" method="post" class="form">
<div class="form-register" id="form">
        <div class="userInfoModif">
            <h2>Paramètres</h2>
            
            <div id="basicUserInfoModif">
<!-- 
                <h3>Profil</h3>
                <div id=boxModifEmail>
                    <img id="photoUser" src="{{$user->photoUser->urlphotoprofil}}" alt="photo utilisateurs" >

                </div> -->




                <h3>Informations sur le compte</h3>
                <div id="radioButtonGenre">
                    @if($user->sexe =='F')

                        <input type="radio"  name="sexe" id="monsieur"  value="H" />
                        <label for="monsieur" >Monsieur</label>
                        <input type="radio" name="sexe"  id="madame" value="F" checked/>
                        <label for="madame">Madame</label>
                        <input type="radio" name="sexe"  id="autre" value="A"/>
                        <label for="autre">Autre</label>
                    
                    @elseif($user->sexe == 'H')
                        <input type="radio"  name="sexe" id="monsieur"  value="H" checked/>
                        <label for="monsieur">Monsieur</label>
                        <input type="radio" name="sexe"  id="madame" value="F"/>
                        <label for="madame">Madame</label>
                        <input type="radio" name="sexe"  id="autre" value="A"/>
                        <label for="autre">Autre</label>

                    @elseif($user->sexe == 'A')
                        <input type="radio"  name="sexe" id="monsieur"  value="H"/>
                        <label for="monsieur">Monsieur</label>
                        <input type="radio" name="sexe"  id="madame" value="F"/>
                        <label for="madame">Madame</label>
                        <input type="radio" name="sexe"  id="autre" value="A" checked/>
                        <label for="autre">Autre</label>
                    @else

                        <input type="radio"  name="sexe" id="monsieur"  value="H"/>
                        <label for="monsieur">Monsieur</label>
                        <input type="radio" name="sexe"  id="madame" value="F"/>
                        <label for="madame">Madame</label>
                        <input type="radio" name="sexe"  id="autre" value="A"/>
                        <label for="autre">Autre</label>
                    
                    @endif
                        
                </div>

                <p for="nomcompte">Nom </p>
                <input id="nomcompte" type="text" name="nomcompte" required value="{{$user->nomcompte}}"/>
                <p for="prenomcompte">Prénom</p>
                <input id="prenomcompte"type="text" name="prenomcompte" required value="{{$user->prenomcompte}}"></input>
                <p for="datenaissanceparticulier">Date de naissance</p>
                <input id="datenaissanceparticulier"type="date" name="datenaissanceparticulier" required value="{{$user->datenaissanceparticulier}}"/>
                <h3>E-mail</h3>
                <div id=boxModifEmail>
                    <!-- <img width="16" height="16" src="https://img.icons8.com/external-thin-kawalan-studio/16/external-protected-shipping-delivery-thin-kawalan-studio-2.png" alt="external-protected-shipping-delivery-thin-kawalan-studio-2"/> -->
                    <input id="emailcompte"type="text" name="emailcompte" required value="{{$user->emailcompte}}"/>
                </div>
                <p for="adresse">Adresse</p>
                <p required value="">{{$user->adresse->numero}} {{$user->adresse->rue}}</p>
                <input type="adresse" name="adresse" id="adresse" >
                
                <ul name="completion" id="completion"></ul> 



                
             
            </div>
            <button type="submit" id="buttonPostDeposit" type="button">Enregistrer les modifications</button>
             <input name="numero" id="numero" type="hidden"/>
            <input name="rueclient" id="rueclient" type="hidden"/>
            <input name="codepostal" id="codepostal" type="hidden"/>
            <input name="ville" id="ville" type="hidden"/>
            <input name="departement" id="departement" type="hidden" />
            <input name="pays" id="pays" type="hidden"/>
        </div>
    @csrf
    </div>

</div>

<form action="{{ route('logout') }}" method="POST">
    @csrf
</form>

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

@endsection



