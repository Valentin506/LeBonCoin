
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
                <form action="/modif-post/post" method="post">
                    <label for="inputDispo">Vous voulez changer la disponibilité ?</label>
                    <input type="submit" id="inputDispo" name="inputDispo">

                </form>
            </div>
            @foreach ($photoPosts as $photoPost)
                @if($photoPost->idannonce === $post->idannonce)
                    @php $hasPhoto = false; @endphp 
                    <div id="divImagePost">
                        <img src="{{ $photoPost -> image}}" alt="Image de l'annonce">
                        @php $hasPhoto = true; break; @endphp
                    </div>

                @endif
                @if($photoPost->idannonce != $post->idannonce)
                    @php $hasText = false; @endphp 
                    <div id="divImagePost">
                        <p>Aucune image associée</p>
                        <form action="/modif-post/updatePost" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="addPhotoPost">Ajoutez photo pour votre annonce</label>
                            <input type="file" name="addPhotoPost" id="addPhotoPost" required>
                            <button type="submit">Chargez l'image</button>
                        </form>
                        @php $hasText = true; break; @endphp
                    </div>

                @endif
            @endforeach
        @endif
    @empty
        <p>Vous n'avez aucune annonce en ligne</p>
    @endforelse
    </div>
    <p>Annonces : </p>{{$totalPost}}
    

    

@endsection