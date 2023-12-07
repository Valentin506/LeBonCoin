
<link rel="stylesheet" type="text/css" href="{{asset('app.css')}}"/> 
<link rel="stylesheet" type="text/css" href="{{asset('post.css')}}"/> 
<!-- Formulaire pour les inscriptions -->


@extends('layouts.app')

@section('title', 'Mes favoris')

@section('content')

<h1>Mes favoris</h1>

@if(count($posts) > 0)

    @foreach ($posts as $post)
        @if ($post)
            <div class="divForEachPost">
                <div id="divImagePost">
                    @php $hasPhoto = false; @endphp
                    @foreach ($photoPosts as $photoPost)
                        @if($photoPost->image && $photoPost->idannonce === $post->idannonce)
                            <img src="{{ $photoPost->image }}" alt="Image de l'annonce">
                            @php $hasPhoto = true; break; @endphp
                        @endif
                    @endforeach
                    @if (!$hasPhoto)
                        <p>Aucune image associée</p>
                    @endif
                </div>
                
                <div>
                    <li id="postTitle"><h3><a href="{{ url("/post/".$post->idannonce) }}">{{ $post->titreannonce }}</a></h3></li>
                    <li>{{ $post->idcapacite }} pers. • {{ $post->typeHebergement->libelletypehebergement }}</li>
                    @if($post->paiementenligne)
                        Paiement en ligne disponible
                    @else
                        Paiement en ligne pas disponible
                    @endif
                </div>

                <!-- Ajoutez le formulaire pour gérer l'ajout ou la suppression des favoris -->
                <form action="{{ url("/favoris/".$post->idannonce."/save") }}" method="post">
                    @csrf
                    @if (Auth::check())
                        @if (Auth::user()->estDansLesFavoris($post->idannonce))
                            <button type="submit" name="favoris" class="favoris">
                                <img src="https://img.icons8.com/windows/20/filled-heart.png" alt="favori" width="20" height="20">
                            </button>
                        @else
                            <button type="submit" name="favoris" class="favoris">
                                <img src="https://img.icons8.com/ios/20/like--v1.png" alt="like--v1" width="20" height="20">
                            </button>
                        @endif
                    @else
                        <button id="buttonPostDeposit" type="button"><a href="{{ url("/login") }}"></a></button>
                    @endif
                </form>
            
            </div>
        @endif
    @endforeach

@else

    <p>Aucune annonce en favori pour le moment.</p>

@endif

@endsection
