<title>Location vacances maison, gite et appartement entre particuliers - leboncoin </title>
<link rel="stylesheet" type="text/css" href="{{asset('post.css')}}"/> 

@extends('layouts.app')

@section('title', 'Leboncoin')

<script src="/js/post-list.js">
</script>

@section('content')

<div class="filterBar">
  <div>
    <input type="text" placeholder="Choisir une destination" autocomplete="off" autocapitalize="off"/>
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
    <input type="text" placeholder="Paiement en ligne" autocomplete="off" autocapitalize="off"/>
    
  </div>
  <div>
    <input placeholder="Filtres" autocomplete="off" autocapitalize="off"/>
  </div>

</div>
</div>
  


<div class="mapContainer">
  <div id="divAnnonce">
    <h2>Posts</h2>

    <div id="divMap">
    <h2>Interactive Map</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d26411.621884404085!2d6.138626302718275!3d45.907715502195934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1700498094956!5m2!1sfr!2sfr" width="570" height="917" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    
  </div>
    <ul>
       @foreach ($posts as $post)
           <li>{{ $post-> idannonce}}</li>
      @endforeach
    </ul>
    
  
  
  @endsection
