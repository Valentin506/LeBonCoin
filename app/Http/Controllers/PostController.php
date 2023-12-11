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
                    'users'=>User::all()]);
    }

    public function one($id){
        $post = Post::find($id);
        $posts = Post::all();
        $photoPosts = PhotoPost::all();
        $photoUser = PhotoUser::find($id);
        $owner = Owner::find($id);
        $user = User::find($id);
        $equipements = Equipement::all();
        $calendar = Calendar::find($id);
        
        
        // $availability = DB::table('calendrier')
        //                 ->join('annonce','annonce.idannonce','=','calendrier.idannonce')
        //                 ->where('periodedebut','<=',$dateArrive)
        //                 ->where('periodefin','>=', $dateDepart)
        //                 ->where('disponibilite', true)
        //                 ->get();

        // $availability = Calendar::where('periodedebut', '<=', $dateArrive)
        //                 ->where('periodefin','>=',$dateDepart)
        //                 ->where('disponibilite', true)
        //                 ->get();

        return view ("one-post", compact('post', 'posts', 'photoPosts', 'photoUser','owner', 'user', 'equipements', 'calendar'));
    }

    public function getAvailableDates(Request $request){
        $dateArrive = $request->get('startDate');
        $dateDepart = $request->get('endDate');
        
        $dateAvailable = Post::whereHas('calendar', function ($query) use ($dateArrive) {
            $query->where('disponibilite', true)
                  ->where('periodedebut', '<=', $dateArrive);
        })->where('datepublication', '<', $dateArrive)
          ->get();
        
        if ($dateAvailable->isNotEmpty()) {
            return response()->json(['message' => 'Available dates found']);
        }
        return view ("one-post", compact('dateAvailable'));
    }

    public function getPostsByCity(Request $request){

        $request->validate([
            'city' => 'required', // Adjust validation rules as needed
        ]);
        $nomville=$request->get('city');
        $typeHebergementId = $request->get('type_hebergement');
        $dateArrive=$request->get('inputDateArrive');
        $dateDepart=$request->get('inputDateDepart');
        
        // $posts= Post::whereHas('calendar', function ($query) use($dateArrive){
        //     $query->where('periodedebut','<=', $dateArrive)->where('disponibilite', true);
        // })->whereHas('post', function ($query) use($dateArrive){
        //     $query->where('datepublication','<=', $dateArrive);
        // })->get();


        // $posts= Post::where(function ($query) use($dateArrive){
        //     $query->where('datepublication','<=', $dateArrive);
        // })->whereHas('calendar', function ($query) use($dateArrive){
        //     $query->where('periodedebut','<=', $dateArrive)->where('disponibilite', true);
        // })->get();
                                

        // $posts= Post::whereHas('post', function($query) use ( $dateArrive){
        //     $query->where('datepublication','<=', $dateArrive);
        // })->whereHas('calendar', function ($query){
        //     $query->where('disponibilite', true);
        // })->get();

        // $posts=DB::table('annonce')
        //         ->join('calendrier','annonce.idannonce','=','calendrier.idannonce')
        //         ->where('annonce.datepublication','<=', $dateArrive)
        //         ->where('calendrier.disponibilite','=',true)
        //         ->get();

        // dd($posts);

        // $posts=DB::table('annonce')
        //         ->join('calendrier','annonce.idannonce','=','calendrier.idannonce')
        //         ->where('annonce.datepublication','>=', $dateDepart)
        //         ->where('calendrier.disponibilite','=',true)
        //         ->get();
        

        // dd($posts);

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
                $posts=DB::table('annonce')
                        ->join('calendrier','annonce.idannonce','=','calendrier.idannonce')
                        ->where('annonce.datepublication','<=', $dateArrive)
                        ->where('calendrier.disponibilite','=','true')
                        ->get();
                dd($posts);
            }
            if($dateDepart != null && $typeHebergementId == ""){
                $posts=DB::table('annonce')
                        ->join('calendrier','annonce.idannonce','=','calendrier.idannonce')
                        ->where('annonce.datepublication','<=', $dateDepart)
                        ->where('calendrier.disponibilite','=','true')
                        ->get();
                dd($posts);
            }
            
        }

        
        // $typehebergements = Post::whereHas('typeHebergement', function ($query) use ($typeHebergementId) {
        //     $query->where('idhebergement', $typeHebergementId);
        // })->get();

        $photoPosts = PhotoPost::all();
        $typeHebergements = TypeHebergement::all();
        $calendars = Calendar::all();
        
        
        return view('post-list', compact('posts', 'photoPosts', 'typeHebergements', 'calendars'));
    }


    // public function search(Request $request)
    // {
    //     $annonces = Post::orderBy('idadresse')->orderBy('idhebergement')->get();
    //     $typeHebergements = Post::all();
    //     // Validate the form data as needed
    //     $typeHebergementId = $request->get('type_hebergement');
        
    //     // Vérifiez si un type d'hébergement a été sélectionné
    //         // Récupérez les annonces liées au type d'hébergement sélectionné
            
    //         $posts = Post::whereHas('typeHebergement', function ($query) use ($typeHebergementId) {
    //             $query->where('idhebergement', $typeHebergementId);
    //         })->get();

           
    //         // $searchResults = Post::where('idhebergement', $typeHebergementId)
    //         // ->get();

    //         // $posts = Post::all();
    //         $photoPosts = PhotoPost::all();
    //         $typeHebergements = TypeHebergement::all();
    
            
    //     // Vous pouvez maintenant utiliser $annonces comme vous le souhaitez
    //     // par exemple, le retourner à une vue pour l'affichage
    //     return view('post-list', compact('posts', 'photoPosts','typeHebergements'));
        
    // }
    

}
