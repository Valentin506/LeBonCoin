
<link rel="stylesheet" type="text/css" href="{{asset('modif-post.css')}}"/> 


@extends('layouts.app')

@section('content')
    @php $totalPost = 0; @endphp
    @forelse ($posts as $post)
    <div class="divForEachPost">
        @if($user->idcompte === $post->owner->idcompte)
            @php $totalPost++ @endphp
            <hr>
                <div id="divEachPost">
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
                            <form action="{{url("/account/{idcompte}/my-posts/update") }}" method="post" enctype="multipart/form-data">
                            <div id="divImagePost">
                                <p>Aucune image associée</p>
                                    @csrf
                                    <!-- <h4>Ajoutez photo pour votre annonce</h4> -->
                                    <input type="file" name="addPhotoPost" id="addPhotoPost" required>
                                    <button type="submit">Chargez l'image</button>
                                    @php $hasText = true; break; @endphp
                            </form>
                            </div>
        
                        @endif
                    @endforeach
                    <div id="divInfoPost">
                        <h3><a href="{{ url("/post/".$post->idannonce) }}">{{ $post-> titreannonce}}</a></h3>

                        <form action="{{url("/account/{idcompte}/my-posts/update") }}" method="post" enctype="multipart/form-data">
                            <label for="inputDispo">Vous voulez changer la disponibilité ?</label>
                            <select name="selectDispo" id="selectDispo">
                                <option value="selectDisponible">Disponible</option>
                                <option value="selectIndisponible">Indisponible</option>
                            </select>
                            <button type="submit">Confirmer</button>
                        </form>
                        
                    </div>
                </div>
            
            </hr>

            
            
        @endif
    @empty
        <p>Vous n'avez aucune annonce en ligne</p>
    @endforelse
    </div>
    <p>Annonces : </p>{{$totalPost}}
    

    

@endsection