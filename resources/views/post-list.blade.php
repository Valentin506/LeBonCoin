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
    required >
    <div id="divDestination" class="dropdown-content">
      <div id="divResult">
        <ul name="completion" id="completion"></ul> 
      </div>
      <div id="divEraseValidate">
        <button id="buttonErase">Effacer</button>
        <button id="buttonValidate">Valider</button>
      </div>
    </div>
    <!-- <select name="" id=""></select>  -->
    <input name="postalcode" id="postalcode" type="hidden"/>
    <input name="city" id="city" type="hidden"/>

    <!-- <form id="divFormRadius" method="post" action="/posts">
      @csrf
      <input type="range" id="inputDestination" class="dropinput" name="inputDestination" placeholder="Choisir un rayon"
      onclick="clickDropdown()"
      autocomplete="off"
      required > -->
    <div id="filterDate">
      <div id="filterDateArrive">
        <label for="inputDateArrive">Arrivée</label>
        <input type="date" id="dateArrive" class="form-control js-daterangepicker" onclick="currentDate()" name="inputDateArrive" placeholder="Date arrivée" autocomplete="off" />

      </div>
      <div id="filterDateDepart">
        <label for="inputDateDepart">Départ</label>
        <input type="date" id="dateDepart" onclick="currentDate()" name="inputDateDepart" placeholder="Date départ" autocomplete="off"/>
      </div>
    </div>


    @if(!is_null($typeHebergements) && count($typeHebergements) > 0)
    <select name="type_hebergement" id="type_hebergement">
        <option value=""></option>

        @foreach($typeHebergements as $typeHebergement)
            <option value="{{ $typeHebergement->idhebergement }}">{{ $typeHebergement->libelletypehebergement }}</option>
        @endforeach
    </select>
    @else
        <p>No accommodation types available</p>
    @endif
     
</form>
  
  <div>
    <label>Voyageurs</label>
    <input id="plusMinusInput" type=number min=1 max=12>
    <button class="plusMinusTraveler" onclick="increment()">+</button>
    <button class="plusMinusTraveler" onclick="decrement()">-</button>
  </div>
  <div>
    <!-- <input type="text" placeholder="Paiement en ligne" autocomplete="off" autocapitalize="off"/> -->
    <button>Paiement en ligne</button>
    
  </div>
  <div>
    <button>Filtres</button>
    <!-- <input placeholder="Filtres" autocomplete="off" autocapitalize="off"/> -->
  </div>
  

</div>


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
              <img src="/images/{{ $photoPost -> image}}" alt="Image de l'annonce">
              @php $hasPhoto = true; break; @endphp
            @endif
          @endforeach
          @if (!$hasPhoto)
            <p>Aucune image associée</p>
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

  <button class="buttonSaveSearch" type="button">Sauvegarder la recherche</button>  
   
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
    

    