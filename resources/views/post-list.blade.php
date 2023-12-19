<title>Location vacances maison, gite et appartement entre particuliers - leboncoin </title>
<link rel="stylesheet" type="text/css" href="{{asset('post.css')}}"/> 
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->

@extends('layouts.app')

@section('title', 'Leboncoin')

<script src="/js/post-list.js"></script>

<!-- <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA02_zspd6i0hRXtpR4bPXltkZHn5C-Irc&libraries=places&callback=initAutocomplete">
</script> -->





@section('content')



<!-- filter Bar -->

<div class="filterBar">
  <form id="divFormAddress" method="post" action="/posts">
    @csrf
    <input type="text" id="inputDestination" class="dropinput" name="inputDestination" placeholder="Ajouter une destination"
    onclick="clickDropdown()"
    onkeyup="autocompleteDestination()"
    autocomplete="off"
    required onchange="updateFields()">
    <div id="divDestination" class="dropdown-content">
      <div id="divResult">
        <ul name="completion" id="completion"></ul> 
      </div>
      <div id="divEraseValidate">
        <button id="buttonErase">Effacer</button>
        
      </div>
    </div>
    <!-- <select name="" id=""></select>  -->
    <input name="postalcode" id="postalcode" type="hidden"/>
    <input name="city" id="city" type="hidden" />

    <!-- <form id="divFormRadius" method="post" action="/posts">
      @csrf
      <input type="range" id="inputDestination" class="dropinput" name="inputDestination" placeholder="Choisir un rayon"
      onclick="clickDropdown()"
      autocomplete="off"
      required > -->
    <div id="filterDate">
      <div id="filterDateArrive">
        <label for="inputDateArrive">Arrivée</label>
        <input type="date" id="dateArrive" class="form-control js-daterangepicker" onclick="currentDate()" name="inputDateArrive" placeholder="Date arrivée" autocomplete="off" onchange="updateFields()" />

      </div>
      <div id="filterDateDepart">
        <label for="inputDateDepart">Départ</label>
        <input type="date" id="dateDepart" onclick="currentDate()" name="inputDateDepart" placeholder="Date départ" autocomplete="off" onchange="updateFields()" />
      </div>
    </div>

    <div id="divTypeHebergement">
      <label for="type_hebergement">Type d'hébergement</label>
      @if(!is_null($typeHebergements) && count($typeHebergements) > 0)
      <select name="type_hebergement" id="type_hebergement" onchange="updateFields()">
          <option value=""></option>
  
          @foreach($typeHebergements as $typeHebergement)
              <option value="{{ $typeHebergement->idhebergement }}">{{ $typeHebergement->libelletypehebergement }}</option>
          @endforeach
      </select>
      @else
          <p>No accommodation types available</p>
      @endif
    </div>

    
    
    <div>
      <label>Voyageurs</label>
      <input id="plusMinusInput" name="plusMinusInput" type=number min=1 max=12 onchange="updateFields()" >
      
    </div>
    <div>
      <!-- <input type="text" placeholder="Paiement en ligne" autocomplete="off" autocapitalize="off"/> -->
      <button>Paiement en ligne</button>
      
    </div>
    

    <button id="buttonValidate">Valider</button>
</form>
  
  
  



</div>
<label id='errorChampDestination'>Le champ type destination est obligatoire</label>

<form method="post" action="/search/save">
  @csrf
    <div>
        <button class="buttonSaveSearch" type="submite" onclick="updateFields()">Sauvegarder la recherche</button>
        <select name="recherches" id="recherches">
          
            @foreach($searchs as $search)
                <option value="{{ $search->idrecherche }}">{{ $search->libellerecherche }}</option>
                
            @endforeach

        </select>

        <input id="city2" name="city2" type="hidden"></input>
        <input id="plusMinusInput2" name="plusMinusInput2" type="hidden"></input>
        <input id="dateArrive2" name="dateArrive2" type="hidden"></input>
        <input id="dateDepart2" name="dateDepart2" type="hidden"></input>
        <input id="typehebergement2" name="typehebergement2" type="hidden"></input>
        <input id="postalcode2" name="postalcode2"></input>
    </div>
</form>





  </br>
<div class="mapContainer">
  <div id="divPost">

    <!-- <h2>Posts</h2> -->
    <ul>
      @foreach ($posts as $post)
      <div class="divForEachPost">
        <div id="divImagePost">
          @php $hasPhoto = false; @endphp
          @foreach ($photoPosts as $photoPost)
            @if($photoPost->image && $photoPost-> idannonce === $post->idannonce)
              @if (Str::startsWith($photoPost -> image, 'https'))
              <img src="{{ $photoPost -> image}}" alt="Image de l'annonce">
              @php $hasPhoto = true; break; @endphp
              @else
              <img src="/images/{{ $photoPost -> image}}" alt="Image de l'annonce">
              @php $hasPhoto = true; break; @endphp
              @endif
            @endif
          @endforeach
          @if (!$hasPhoto)
            <div id="divImagePost">
              <img src="/images/No_Image_Available.jpg" alt="Image de l'annonce">
            </div>
          @endif
        </div>
        
        <div >
          <li id="postTitle"><h3><a href="{{ url("/post/".$post->idannonce) }}">{{ $post-> titreannonce}}</a></h3></li>
          <li>{{ $post -> idcapacite}} pers. • {{ $post -> typeHebergement ->libelletypehebergement }}</li>
          @if($post->paiementenligne)
              Paiement en ligne disponible
          @else
              Paiement en ligne pas disponible
          @endif
          
        </div>




        <!-- Supposons que $post est une instance de App\Models\Post -->
        <form action="{{ url("/favoris/".$post->idannonce."/save") }}" method="post">
            @csrf
          
            @if (Auth::check() && Auth::user()->estDansLesFavoris($post->idannonce))
                <button type="submit" name="favoris" class="favoris">
                    <img src="https://img.icons8.com/windows/20/filled-heart.png" alt="favori" width="20" height="20">
                </button>
            @elseif(Auth::check())
                  <button type="submit" name="favoris" class="favoris">
                      <img src="https://img.icons8.com/ios/20/like--v1.png" alt="like--v1" width="20" height="20">
                  </button>
                @else
                <button type="button" name="favoris" class="favoris">
                <a href="{{url("/login")}}"><img src="https://img.icons8.com/ios/20/like--v1.png" alt=""></a>
                  </button>
           
            
            @endif 
         
          
        </form>
        <!-- <form action="{{ url("/favoris/".$post->idannonce."/save") }}" method="post">
          @csrf
          <button type="submit" name="favoris" class="favoris">
              <img src="https://img.icons8.com/ios/20/like--v1.png " alt="like--v1" width="20" height="20">
          </button>
        </form> -->
    
        
      </div>
      @endforeach
    </ul>
    
    
    
  </div>
  
  <div id="divMap">
    <!-- <h2>Interactive Map</h2> -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d22209.6574381!2d6.146402879809569!3d45.90716746238615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1700522627305!5m2!1sfr!2sfr" width="570" height="917" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>

    
   
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
$(function() {
  $('input[name="inputDateArrive"]').daterangepicker({
    opens: 'left',
  }, function(start, end, label) {
    console.log("Une date a été sélectionnée: " + start.format('DD-MM-YYYY') + ' à ' + end.format('DD-MM-YYYY'));
  });
});
</script> -->


@endsection
    
<script>
    // Fonction pour mettre à jour les champs Ville2 et Capacité2
    function updateFields() {
        // Sélectionnez les champs
        var villeInput = document.getElementById('city');
        var capaciteInput = document.getElementById('plusMinusInput');
        var ville2Input = document.getElementById('city2');
        var capacite2Input = document.getElementById('plusMinusInput2');
        var dateDebutInput = document.getElementById('dateArrive');
        var dateDebut2Input = document.getElementById('dateArrive2');
        var dateDepartInput = document.getElementById('dateDepart');
        var dateDepart2Input = document.getElementById('dateDepart2');
        var type = document.getElementById('type_hebergement');
        var type2 = document.getElementById('typehebergement2');
        var postalcode2 = document.getElementById('postalcode2');
        var postalcode = document.getElementById('postalcode');

        // Mettez à jour les valeurs des champs Ville2 et Capacité2 avec les valeurs des champs correspondants
        ville2Input.value = villeInput.value;
        capacite2Input.value = capaciteInput.value;
        dateDebut2Input.value = dateDebutInput.value;
        dateDepart2Input.value = dateDepartInput.value;
        type2.value = type.value;
        postalcode2.value = postalcode.value;
    }
</script>