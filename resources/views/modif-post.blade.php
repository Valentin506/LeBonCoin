
<link rel="stylesheet" type="text/css" href="{{asset('modif-post.css')}}"/> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@extends('layouts.app')

@section('content')
    @php $totalPost = 0; @endphp
    @forelse ($posts as $post)
    <div class="divForEachPost">
        @if($user->idcompte === $post->owner->idcompte)
            @php $totalPost++ @endphp
            <hr>
                <div id="divEachPost">
                    @php $hasPhoto = false; @endphp 
                    @foreach ($photoPosts as $photoPost)
                        @if($photoPost-> idannonce === $post->idannonce)
                            <div id="divImagePost">
                                @if (Str::startsWith($photoPost -> image, 'https'))
                                <img src="{{ $photoPost -> image}}" alt="Image de l'annonce">
                                @php $hasPhoto = true; break; @endphp
                                @else
                                <img src="/images/{{ $photoPost -> image}}" alt="Image de l'annonce">
                                @php $hasPhoto = true; break; @endphp
                                @endif
                            </div>
                        @endif
                    @endforeach
                    @if($hasPhoto === false)
                        <div id="divImagePost">
                            <img src="/images/No_Image_Available.jpg" alt="Image de l'annonce">
                        </div>
                    @endif
                    <div id="divInfoPost">
                        <h3><a href="{{ url("/post/".$post->idannonce) }}">{{ $post-> titreannonce}}</a></h3>
                        <form action="/account/{idcompte}/my-posts/update" method="post" enctype="multipart/form-data">
                                @csrf
                                <h4>Ajoutez photo pour votre annonce :</h4>
                                <div style="display: flex;">
                                    <input id="addPhotoPost" name="addPhotoPost" type="file">
                                    <button type="submit">Chargez l'image</button>
                                    <input type="hidden" name="idannonce" value="{{ $post->idannonce }}">

                                </div>
                        </form>

                        <form action="/account/{idcompte}/my-posts/update-disponibilite" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="inputDispo">Vous voulez changer la disponibilité ?</label>
                            <select name="selectDispo" id="selectDispo">
                                <option value="Disponible">Disponible</option>
                                <option value="Indisponible">Indisponible</option>
                            </select>
                            <!-- {{$post->idannonce}} -->
                            <button class="update-disponibilite" data-post-id="{{ $post->idannonce }}">Confirmer</button>
                            <input type="hidden" name="idannonce" value="{{ $post->idannonce }}">
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

    <script>
        $(document).ready(function(){
            $('.update-disponibilite').click(function(){
                var postId = $(this).data('post-id');
                console.log(postId);
                $.ajax({
                    url: '/account/{idcompte}/my-posts/update-disponibilite',
                    method: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        postId: postId,    
                    },
                    success: function(result) {
                        if(result.status === 'success') {
                            alert(result.message);
                        } else if(result.status === 'error') {
                            alert(result.message);
                        }
                    }
                });
            });
        });
    </script>
    

    

@endsection