
<head>
        <title>{{ $post-> titreannonce." - Locations saisonières"}}</title>
        <link rel="stylesheet" type="text/css" href="{{asset('post.css')}}"/> 
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
      
</head>

@extends('layouts.app')


@section('content')
<script src="/js/one-post.js"></script>

<body> 
<div id="fb-root"></div>

        
        <div class="postContainer">
                <div class="postDiv">
                        <!-- image description with slider -->
                        <div class="postPhoto">
                                <div class="postPhotoButton">
                                        <button class="prevArrow"><</button>
                                        <button class="nextArrow">></button>

                                </div>
                                <div class="postTotalPhotoDiv">
                                        @foreach ($photoPosts as $photoPost)
                                        @if($photoPost->image && $photoPost->idannonce === $post->idannonce)
                                        <div class="postPhotoDiv">
                                                <img src="{{ $photoPost -> image}}" alt="Image de l'annonce">
                                        </div>
                                        @endif
                                        @endforeach
                                        
                
                                </div>

                        </div>
                        
                        <!-- description div for post description -->
                        <div id="postDescriptionDiv">
                                <div>
                                        <ul class="elementsDescription">
                                                <h2>{{ $post -> titreannonce }}</h2>
                                                <li>{{ $post -> typeHebergement ->libelletypehebergement }}</li>
                                                <li>•</li>
                                                <li>{{ $post -> capaciteLogement -> nombrepersonne }} personnes</li>
                                                <li>•</li>
                                                <li>{{ $post -> adresseAnnonce -> ville -> nomville }}</li>
                                        </ul>
                                        
                                        @if($post->paiementenligne)
                                        Paiement en ligne disponible
                                        @else
                                        Paiement en ligne pas disponible
                                        @endif
                                        
                                        <p>Publié le {{ $post -> datepublication }}</p>

                                </div>

                                <div>

                                        <h3>Équipements et services</h3>
                                        <div class="divEquipService">
                                               @foreach($post->equipements as $equipement)
                                                        <div id="divEquip"><p>{{$equipement->libelleequipement}}</p></div>
                                               @endforeach 
                                               @foreach($post->services as $service)
                                                        <div id="divService"><p>{{$service->libelleservice}}</p></div>
                                               @endforeach
                                        </div>
                                </div>

                                <div>
                                        <h3>Description</h3>
                                        <p>{{ $post -> description }}</p>

                                </div>

                                <h3>Critères</h3>
                                <div id="postCriteresDiv">
                                        <div>
                                                <p>Nombre d'étoiles</p>
                                                <span>Non classé</span>
                                        </div>
                                        <div>
                                                <p>Capacité</p>
                                                <span>{{ $post->idcapacite}} personnes</span>
                                        </div>
                                        <div>
                                                <p>Type de logement</p>
                                                <span>{{ $post->typeHebergement->libelletypehebergement}}</span>
                                        </div>
                                        
                                        <div>
                                                <p>Nature du logement</p>
                                                <span>{{ $post->typeHebergement->libelletypehebergement}}</span>
                                        </div>
                                </div>
                               
                                <div id="buttonFooter">
                                        <!-- button copy link -->
                                        <button id="copyButton">Copier le lien de l'annonce</button>
                                        <!-- button share on facebook-->
                                        <!-- script to share on  facebook  -->
                                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v18.0" nonce="70MaByun"></script>
                                        <div class="fb-share-button" data-href="{{ url("/post/".$post->idannonce) }}" data-layout="" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partager</a></div>
                                        <!-- button share on twitter -->
                                        <a class="twitter-share-button"href="https://twitter.com/intent/tweet?text={{ url("/post/".$post->idannonce) }}"data-size="large"><i><img width="18" height="18" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2072%2072%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h72v72H0z%22%2F%3E%3Cpath%20class%3D%22icon%22%20fill%3D%22%23fff%22%20d%3D%22M68.812%2015.14c-2.348%201.04-4.87%201.744-7.52%202.06%202.704-1.62%204.78-4.186%205.757-7.243-2.53%201.5-5.33%202.592-8.314%203.176C56.35%2010.59%2052.948%209%2049.182%209c-7.23%200-13.092%205.86-13.092%2013.093%200%201.026.118%202.02.338%202.98C25.543%2024.527%2015.9%2019.318%209.44%2011.396c-1.125%201.936-1.77%204.184-1.77%206.58%200%204.543%202.312%208.552%205.824%2010.9-2.146-.07-4.165-.658-5.93-1.64-.002.056-.002.11-.002.163%200%206.345%204.513%2011.638%2010.504%2012.84-1.1.298-2.256.457-3.45.457-.845%200-1.666-.078-2.464-.23%201.667%205.2%206.5%208.985%2012.23%209.09-4.482%203.51-10.13%205.605-16.26%205.605-1.055%200-2.096-.06-3.122-.184%205.794%203.717%2012.676%205.882%2020.067%205.882%2024.083%200%2037.25-19.95%2037.25-37.25%200-.565-.013-1.133-.038-1.693%202.558-1.847%204.778-4.15%206.532-6.774z%22%2F%3E%3C%2Fsvg%3E" alt="twitter--v1"/></i>Tweet</a>
                                        
                                </div>
                                <!-- to return to locations page -->
                                <h3><p><a href="{{ url("/posts") }}">Retour vers les locations saisonières</a></p></h3>

                        </div>
                
                </div>
                
                <!-- div about owner -->
                <div class="ownerPostDiv">
                        <!-- date avail div -->
                        <form action="{{url("/reservation") }}" method="get" class="form" >
                        @csrf
                        <div id="postDateDiv">
                                <div id="divDate">
                                        <div id="divSelectDate">
                                                <h4>Sélectionnez vos dates de séjour :</h4>
                                                <div id="divDateArriveDepart">
                                                        <div id="divDateArrive">
                                                                <label for="startDate">Arrivée</label>
                                                                <input type="date" id="startDate" name="startDate" onclick="currentDate()">
                                                        </div>

                                                        <!-- <label for="numberOfDays">Nombre de jours:</label>
                                                        <input type="number" id="numberOfDays" name="numberOfDays" min="1" value="1" oninput="updateEndDate()"> -->

                                                        <div id="divDateDepart">

                                                                <label for="endDate">Départ</label>
                                                                <input type="date" id="endDate" name="endDate" onclick="currentDate()">
                                                        </div>

                                                </div>
                                                <!-- <div>
                                                        <input type="range" id="vol" name="vol" min="0" max="12">
                                                </div> -->
                                                <div class="form-group">Disponibilité à jour</div>
                                                
                                                
                                        </div>
                                        <div id="divPriceVerifDate">
                                                <div>
                                                        
                                                        <p>À partir de </p>
                                                        <div>Prix € / nuit</div>
                                                       

                                                </div>
                                                <div><button>Vérifier la disponibilité</button></div>
                                        </div>

                                </div>
                        </div>
                        </form>
                        <!-- photo and info owner div -->
                        <div id="postOwnerDiv">
                                <!-- photo for each owner of the post -->
                                <div id="divPhotoOwner">
                                        <img src="{{$post->owner->user->photoUser->urlphotoprofil}}" alt="photo utilisateurs">
                                </div>
                                <!-- basic info owner -->
                                <div id="basicInfoDiv">
                                        <!-- link owner with post -->
                                        <h3><a href="{{ url("/profile/".$post->idproprietaire) }}">{{ $post -> owner->user->pseudocompte}}</a></h3>
                                        <!-- total of owner's posts -->
                                        <!-- @php $totalPost = 0; @endphp
                                        @if($post->owner->idcompte)
                                                @php $totalPost++; @endphp
                                        @endif
                                        <p>{{ $totalPost}} annonce(s)</p> -->
                                        <!--  -->
                                        <p>Note de x sur x</p>
                                </div>
                                <div><a href="{{ url("/profile/".$post->idproprietaire) }}"><img src="https://cdn-icons-png.flaticon.com/512/32/32213.png" alt="arrow direct to owner page"></a></div>
                
                        </div>
        
                </div>

                </form>
        
        </div>

        <!-- slider -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script type="text/javascript">
                $('.postTotalPhotoDiv').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        prevArrow: $(".prevArrow"),
                        nextArrow: $(".nextArrow")
                });
        </script>
       

       <script>
        document.getElementById('copyButton').addEventListener('click', function() {
            // Récupérer le lien du site
            var currentURL = window.location.href;

            // Créer un élément temporaire (input) pour y placer le lien
            var tempInput = document.createElement('input');
            tempInput.value = currentURL;
            document.body.appendChild(tempInput);

            // Sélectionner le texte dans l'élément temporaire
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); /* For mobile devices */

            // Copier le texte dans le presse-papiers
            document.execCommand('copy');

            // Retirer l'élément temporaire
            document.body.removeChild(tempInput);

            alert('Lien copié dans le presse-papiers : ' + currentURL);
        });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script>
                
                $array[] = $calendar->nonAvailable->format('Y-m-d');
  
                var dateToday = new Date();
                var selectedDate;
                var unavailableDates = $array[];
                $("#startDate").datepicker({
                        minDate: dateToday,
                        onSelect: function (dateText, inst) {
                                selectedDate = $(this).datepicker( "getDate" );
                                var slctdDate = selectedDate.getDate()
                                // alert(selectedDate);
                                $("#endDate").datepicker({
                                        minDate: inst.day,
                                        beforeShowDay: function(date){
                                        //Only allow fri, sat
                                                var day = date.getDay();
                                                return [ day != 0 && day != 6 && $.inArray(date.toISOString().slice(0, 10), unavailableDates) === -1,
                                                ''
                                                ];
                                                // return [date.getDate()==slctdDate];

                                        }
                                });

                        }
                });

                $("#endDate").datepicker({
                        minDate: dateToday,
                        onSelect: function (dateText, inst) {
                                selectedDate = $(this).datepicker( "getDate" );
                                var slctdDate = selectedDate.getDate($noAvailable)
                                // alert(selectedDate);
                                $("#endDate").datepicker({
                                        minDate: inst.day,
                                        beforeShowDay: function(date){
                                        //Only allow fri, sat

                                                return [date.getDate()==slctdDate];

                                        }
                                });

                        }
                });

        </script>
        

</body>

@endsection



