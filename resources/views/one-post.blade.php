<link rel="stylesheet" type="text/css" href="{{asset('post.css')}}"/> 

@extends('layouts.app')

@section('title', 'Leboncoin')


@section('content')

<h2>{{ $post -> titreannonce }}</h2>

<p>{{ $post -> paiementenligne }}</p>
<p>{{ $post -> description }}</p>
<p>{{ $post -> datepublication }}</p>

<p><a href="{{ url("/posts") }}">Retour vers les locations saisonières</a></p>

@endsection