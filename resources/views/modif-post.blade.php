
<link rel="stylesheet" type="text/css" href="{{asset('modif-post.css')}}"/> 


@extends('layouts.app')

@section('content')
    @php $totalPost = 0; @endphp
    @forelse ($posts as $post)
    <div class="divForEachPost">
        @if($user->idcompte === $post->owner->idcompte)
            @php $totalPost++ @endphp
            <div>
                <h3><a href="{{ url("/post/".$post->idannonce) }}">{{ $post-> titreannonce}}</a></h3>
            </div>
            <!-- @foreach ($photoPosts as $photoPost)
                @php $hasPhoto = false; @endphp
                @if($photoPost-> idannonce === $post->idannonce)
                    <div id="divImagePost">
                        <img src="{{ $photoPost -> image}}" alt="Image de l'annonce">
                        @php $hasPhoto = true; break; @endphp
                    </div>
                @endif
                
            @endforeach -->
        @endif
    @empty
        <p>Vous n'avez aucune annonce en ligne</p>
    @endforelse
    </div>
    <p>Total post: </p>{{$totalPost}}
    <button id="buttonImage">Ajouter image pour votre annonce</button>

    

@endsection