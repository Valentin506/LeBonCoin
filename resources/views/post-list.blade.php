@extends('layouts.app')

@section('title', 'Leboncoin')



@section('content')
<h2>Posts</h2>
<ul>
   @foreach ($posts as $post)
       <li>{{ $post-> idannonce}}</li>
  @endforeach
</ul>
@endsection