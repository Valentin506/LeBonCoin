<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\PhotoPost;
use App\Models\Owner;
use App\Models\User;
use App\Models\TypeHebergement;
use App\Models\Ville;
use App\Models\Departement;
use App\Models\Adresse;
use App\Models\PhotoUser;
use App\Models\CapaciteLogement;
use App\Models\Equipement;
use App\Models\Calendar;
use App\Models\Search;


class PostController extends Controller
{

    
    public function post(){
        // $posts = Post::all();
        // $photoUsers = PhotoUser::all();
        // $owners = Owner::all();
        // $users = User::all();
    	return view ("post-list", ['posts'=> Post::all(),
                    'photoPosts'=>PhotoPost::all(),
                    'owners'=>Owner::all(),
                    'typeHebergements'=>TypeHebergement::all(),
                    'cities'=>Ville::all(),
                    'departments'=>Departement::all(),
                    'users'=>User::all(),
                    'searchs' => Search::all()
                    
                ]);
    }

    public function one($id, Request $request){
        $post = Post::find($id);
        $posts = Post::all();
        $photoPosts = PhotoPost::all();
        $photoUser = PhotoUser::find($id);
        $owner = Owner::find($id);
        $user = User::find($id);
        $equipements = Equipement::all();
        $calendar = Calendar::find($id);
        $searchs = Search::all();
        
        $annoncePrincipale = Post::findOrFail($id);
    
        // Récupérer les annonces similaires dans la même ville et avec le même type d'hébergement
        $annoncesSimilaires = Post::where('idannonce', '!=', $id)
            ->whereHas('adresseAnnonce.ville', function ($query) use ($annoncePrincipale) {
                $query->where('nomville', $annoncePrincipale->adresseAnnonce->ville->nomville);
            })
            ->where('idhebergement', $annoncePrincipale->idhebergement)
            ->get();
        
        // Récupérer les dates disponibles
        $dateArrive = $request->get('startDate');
        $dateDepart = $request->get('endDate');
        


        $availableDates = Calendar::where('idannonce', $post->idannonce)
                        ->where('disponibilite','=', true)
                        ->get()
                        
                        ->map(function($calendar){
                            return [
                                'periodedebut' => \Carbon\Carbon::parse($calendar->periodedebut)->format('Y-m-d'),
                                'periodefin' => \Carbon\Carbon::parse($calendar->periodefin)->format('Y-m-d')
                                
                            ];
                        });
        
        $unavailableDates = Calendar::where('idannonce', $post->idannonce)
                        ->where('disponibilite','=', false)
                        ->get()
                        
                        ->map(function($calendar){
                            return [
                                'periodedebut' => \Carbon\Carbon::parse($calendar->periodedebut)->format('Y-m-d'),
                                'periodefin' => \Carbon\Carbon::parse($calendar->periodefin)->format('Y-m-d')
                                
                            ];
                        });
        
        
        // dd($availableDates);
                                
      
        
        return view ("one-post", compact('post', 'posts', 'photoPosts', 'photoUser','owner', 'user', 'equipements', 'calendar','annoncePrincipale', 'annoncesSimilaires','availableDates','unavailableDates','searchs'));
    }

    public function getNonAvailableDates($id, Request $request){

        $post = Post::find($id);
        $posts = Post::all();
        $photoPosts = PhotoPost::all();
        $photoUser = PhotoUser::find($id);
        $owner = Owner::find($id);
        $user = User::find($id);
        $equipements = Equipement::all();
        $calendars = Calendar::where('idannonce', $post->idannonce)->get();
        $calendar = Calendar::find($id);
        $searchs = Search::all();
        
        $annoncePrincipale = Post::findOrFail($id);
    
        // Récupérer les annonces similaires dans la même ville et avec le même type d'hébergement
        $annoncesSimilaires = Post::where('idannonce', '!=', $id)
            ->whereHas('adresseAnnonce.ville', function ($query) use ($annoncePrincipale) {
                $query->where('nomville', $annoncePrincipale->adresseAnnonce->ville->nomville);
            })
            ->where('idhebergement', $annoncePrincipale->idhebergement)
            ->get();
        
        // Récupérer les dates disponibles
        $dateArrive = $request->get('startDate');
        $dateDepart = $request->get('endDate');
        


        $availableDates = Calendar::where('idannonce', $post->idannonce)
                        ->where('disponibilite','=', true)
                        ->get()
                        
                        ->map(function($calendar){
                            return [
                                'periodedebut' => \Carbon\Carbon::parse($calendar->periodedebut)->format('Y-m-d'),
                                'periodefin' => \Carbon\Carbon::parse($calendar->periodefin)->format('Y-m-d')
                                
                            ];
                        });

        // dd($dateArrive, $dateDepart);
        foreach($calendars as $calendar){
            $unavailableDatesCreate = Calendar::create([
                                'idannonce' => $post->idannonce,
                                'periodedebut' => $dateArrive,
                                'periodefin' => $dateDepart,
                                'disponibilite' => false
            ]);
        }

        $unavailableDates = Calendar::where('idannonce', $post->idannonce)
                        ->where('disponibilite','=', false)
                        ->get()
                        
                        ->map(function($calendar){
                            return [
                                'periodedebut' => \Carbon\Carbon::parse($calendar->periodedebut)->format('Y-m-d'),
                                'periodefin' => \Carbon\Carbon::parse($calendar->periodefin)->format('Y-m-d')
                                
                            ];
                        });
        
        return view ("reservation", compact('post', 'posts', 'photoPosts', 'photoUser','owner', 'user', 'equipements', 'calendar','annoncePrincipale', 'annoncesSimilaires','availableDates','unavailableDates','calendars'));

    }


    public function getPostsByCity(Request $request){

        $request->validate([
            'city' => 'required', // Adjust validation rules as needed
        ]);
        $nomville=$request->get('city');
        $typeHebergementId = $request->get('type_hebergement');
        $dateArrive=$request->get('inputDateArrive');
        $dateDepart=$request->get('inputDateDepart');
        $user = auth()->user();
        

        if($nomville!=null){
            if($typeHebergementId == ""){
                $posts = Post::whereHas('adresseAnnonce.ville', function($query) use ($nomville){
                    $query->where('nomville', $nomville);
                })->get();
            }
            else{
                $posts = Post::whereHas('adresseAnnonce.ville', function($query) use ($nomville){
                    $query->where('nomville', $nomville);
                })->whereHas('typeHebergement', function ($query) use ($typeHebergementId) {
                    $query->where('idhebergement', $typeHebergementId);
                })->get();
            }
            if($dateArrive != null && $typeHebergementId == ""){
                $posts=Post::whereHas('adresseAnnonce.ville', function($query) use ($nomville, $dateArrive){
                    $query->where('nomville', $nomville);
                })->whereHas('calendar', function ($query) use($dateArrive, $dateDepart){
                    $query->whereBetween('periodedebut',[$dateArrive,$dateDepart])
                            ->orWhereBetween('periodefin',[$dateArrive,$dateDepart])
                            ->where('disponibilite', true);
                })->get();
                
            }
            
            
        }

        
        // $typehebergements = Post::whereHas('typeHebergement', function ($query) use ($typeHebergementId) {
        //     $query->where('idhebergement', $typeHebergementId);
        // })->get();

        $photoPosts = PhotoPost::all();
        $typeHebergements = TypeHebergement::all();
        $calendars = Calendar::all();
        $searchs = Search::all();
        
        
        return view('post-list', compact('posts', 'photoPosts', 'typeHebergements', 'calendars', 'user', 'searchs'));
    }


   public function searchSave(Request $request)
   {
        $request->validate([
            'city2' => 'required', // Adjust validation rules as needed
        ]);
        $user = auth()->user();
       

        $search = new Search;
        $idcapacite = $request -> input("plusMinusInput2");
        $search -> idcapacite = $idcapacite;
        $search -> idcompte = $user -> idcompte;
        
        $search -> datedebut = $request -> input("dateArrive2"); 
        $search -> datefin = $request -> input("dateDepart2");
        
        $search -> idhebergement = $request -> input("typehebergement2");

        //$search -> idville = $request -> input("city2");
        $nomville = $request -> input("city2");
        $ville = Ville::where('nomville', $nomville)->first();
        
        if (!$ville) {
            // La ville n'existe pas, donc nous la créons
            $ville = new Ville();
            $ville->nomville = $nomville;
            $iddep = $request -> input("postalcode2");
            $ville -> iddepartement = substr($iddep,0,2);
            $ville -> codepostal = $request -> input("postalcode2");
            // Vous pouvez ajouter d'autres colonnes si nécessaire
            $ville->save();
        }

        $idVille = $ville->idville;

        $search -> idville = $idVille;
        //dd($search);
        $libelleRecherche = $ville->nomville . ' - '. $search->datedebut . ' - '  . $search->datefin . ' - ' . $search->idhebergement . ' - ' . $search->idcapacite;

        $search->libellerecherche = $libelleRecherche;
        $search -> save();


        $photoPosts = PhotoPost::all();
        $typeHebergements = TypeHebergement::all();
        $calendars = Calendar::all();
        $posts = Post::all();
        $searchs = Search::all();
        return view('post-list',  compact('posts', 'photoPosts', 'typeHebergements', 'calendars', 'searchs', 'user'));
   }


}
