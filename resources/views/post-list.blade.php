@extends('layouts.app')

@section('title', 'Leboncoin')



@section('content')
<h2>Les annonces</h2>
<ul>
   @foreach ($annonces as $annonce)
       <li>{{ $annonce-> idannonce}}</li>
  @endforeach
</ul>
@endsection