<title>Location vacances maison, gite et appartement entre particuliers - leboncoin </title>
<link rel="stylesheet" type="text/css" href="{{asset('post.css')}}"/> 

@extends('layouts.app')

@section('title', 'Leboncoin')

<script src="/js/post-list.js">
</script>

@section('content')
<h2>Posts</h2>

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

<div class="mapContainer">
  <div id="divAnnonce">

  </div>
  <div id="divMap">

  </div>
</div>


<ul>
   @foreach ($posts as $post)
       <li>{{ $post-> idannonce}}</li>
  @endforeach
</ul>
@endsection