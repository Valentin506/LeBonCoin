<title>Location vacances maison, gite et appartement entre particuliers - leboncoin </title>
<link rel="stylesheet" type="text/css" href="{{asset('post.css')}}"/> 

@extends('layouts.app')

@section('title', 'Leboncoin')

<script src="/js/post-list.js"></script>

<script type=”text/javascript” src=”https://maps.googleapis.com/maps/api/js?key=AIzaSyC-Izr5CeGnoqIE8a5AGquUSIE8DnRVR34&libraries=places“></script>



@section('content')



<!-- filter Bar -->

<div class="filterBar">
  <div>
    
    <input id="destinationAddress" name="destinationAddress" required placeholder="Choisir une destination">
    <select name="" id="">
      <option value=""></option>
    </select>
  
  </div>
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


</div>


<div class="mapContainer">
  <div id="divPost">
    <!-- <h2>Posts</h2> -->
    <ul>
      @foreach ($posts as $post)
      <div class="divForEachPost">
        <div id="divImagePost">
          @php $hasPhoto = false; @endphp
          @foreach ($photoUsers as $photoUser)
            @if($photoUser->image && $photoUser -> idimage === $post -> idimage)
              <img src="{{ $photoUser-> image }}" alt="Image de l'annonce">
              @php $hasPhoto = true; break; @endphp
            @endif
          @endforeach
          @if(!$hasPhoto)
              <p>Aucune image associée</p>
          @endif
            
        </div>
        
        <div>
          <li id="postTitle"><h3><a href="{{ url("/post/".$post->idannonce) }}">{{ $post-> titreannonce}}</a></h3></li>
          <li>Voyageurs : {{ $post -> idcapacite}}</li>
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
    