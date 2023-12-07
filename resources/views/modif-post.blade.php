
<link rel="stylesheet" type="text/css" href="{{asset('modif-post.css')}}"/> 


@extends('layouts.app')

    @foreach ($posts as $post)
    <div class="divForEachPost">
        <div>
            <h3><a href="{{ url("/post/".$post->idannonce) }}">{{ $post-> titreannonce}}</a></h3>
        </div>
        @php $hasPhoto = false; @endphp
        @foreach ($photoPosts as $photoPost)
        @if($photoPost-> idannonce === $post->idannonce)
            <div id="divImagePost">
                <img src="{{ $photoPost -> image}}" alt="Image de l'annonce">
                @php $hasPhoto = true; break; @endphp
            </div>
            @endif
        @endforeach
    @endforeach