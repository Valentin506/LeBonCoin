
<link rel="stylesheet" type="text/css" href="{{asset('profile.css')}}"/> 
<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<!-- Formulaire pour les inscriptions -->

<div class="marginViewProfile">
    @extends('layouts.app')
    
    @section('content')

<form action="{{url("/modif-account/update") }}" method="post" class="form">
<div class="form-register" id="form">
        <div class="userInfoModif">
            <h2>Paramètres</h2>
            
            <div id="basicUserInfoModif">

                <h3>Profil</h3>
                <div id=boxModifEmail>
                    <img id="photoUser" src="{{$user->photoUser->urlphotoprofil}}" alt="photo utilisateurs" >

                </div>




                <h3>Informations sur le compte</h3>
                <div id="radioButtonGenre">
                    @if($user->sexe =='F')

                        <input type="radio"  name="sexe" id="monsieur"  value="H" />
                        <label for="monsieur" >Monsieur</label>
                        <input type="radio" name="sexe"  id="madame" value="F" checked/>
                        <label for="madame">Madame</label>
                    
                    @elseif($user->sexe == 'H')
                        <input type="radio"  name="sexe" id="monsieur"  value="H" checked/>
                        <label for="monsieur">Monsieur</label>
                        <input type="radio" name="sexe"  id="madame" value="F"/>
                        <label for="madame">Madame</label>
                    
                    @else

                        <input type="radio"  name="sexe" id="monsieur"  value="H"/>
                        <label for="monsieur">Monsieur</label>
                        <input type="radio" name="sexe"  id="madame" value="F"/>
                        <label for="madame">Madame</label>
                    
                    @endif
                        
                </div>

                <p for="nomcompte">Nom </p>
                <input id="nomcompte" type="text" name="nomcompte" required value="{{$user->prenomcompte}}"/>
                <p for="prenomcompte">Prénom</p>
                <input id="prenomcompte"type="text" name="prenomcompte" required value="{{$user->nomcompte}}"></input>
                <p for="datenaissanceparticulier">Date de naissance</p>
                <input id="datenaissanceparticulier"type="date" name="datenaissanceparticulier" required value="{{$user->datenaissanceparticulier}}"/>
                <h3>E-mail</h3>
                <div id=boxModifEmail>
                <!-- <img width="16" height="16" src="https://img.icons8.com/external-thin-kawalan-studio/16/external-protected-shipping-delivery-thin-kawalan-studio-2.png" alt="external-protected-shipping-delivery-thin-kawalan-studio-2"/> -->
                <input id="emailcompte"type="text" name="emailcompte" required value="{{$user->emailcompte}}"/>


                
             
            </div>
            <button type="submit" id="buttonPostDeposit" type="button">Enregistrer les modifications</button>
           
        </div>
    @csrf
    </div>

@endsection

</div>
