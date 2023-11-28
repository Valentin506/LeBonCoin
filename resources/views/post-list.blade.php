<title>Location vacances maison, gite et appartement entre particuliers - leboncoin </title>
<link rel="stylesheet" type="text/css" href="{{asset('post.css')}}"/> 

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
    required>
    <div id="divDestination" class="dropdown-content">
      <div id="divResult">
        <ul name="completion" id="completion"></ul> 
      </div>
      <div id="divEraseValidate">
        <button id="buttonErase">Effacer</button>
        <button id="buttonValidate">Valider</button>
      </div>
    </div>
    <select name="" id=""></select> 
    <input name="postalcode" id="postalcode" type="hidden"/>
    <input name="city" id="city" type="hidden"/>
    <input name="department" id="department" type="hidden" />
    <input name="countries" id="countries" type="hidden"/>
    
     
</form>
  <div>
    <input type="date" placeholder="Dates" autocomplete="off" autocapitalize="off"/>
    <select name="" id="">
      <option value=""></option>
    </select>
  </div>
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
  <div>
        
  <form id="searchForm" action="{{ route('search') }}" method="GET">
    <select name="type_hebergement" id="type_hebergement">
        <option value="" disabled selected>Select Type of Accommodation</option>
        @foreach($typeHebergements as $typeHebergement)
            <option value="{{ $typeHebergement->id }}">{{ $typeHebergement->libelletypehebergement }}</option>
        @endforeach
    </select>
    <button type="submit">Search</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#type_hebergement').on('change', function() {
            $('#searchForm').submit();
        });
    });
</script>

    
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
              <img src="{{ $photoPost -> image}}" alt="Image de l'annonce">
              @php $hasPhoto = true; break; @endphp
            @endif
          @endforeach
          @if (!$hasPhoto)
            <p>Aucune image associée</p>
          @endif
        </div>

        <div>
          <li id="postTitle"><h3><a href="{{ url("/post/".$post->idannonce) }}">{{ $post-> titreannonce}}</a></h3></li>
          <li>{{ $post -> idcapacite}} pers. • {{ $post -> typeHebergement ->libelletypehebergement }}</li>
          @if($post->paiementenligne)
              Paiement en ligne disponible
          @else
              Paiement en ligne pas disponible
          @endif
          
        </div>
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

    
    @endsection
    

    