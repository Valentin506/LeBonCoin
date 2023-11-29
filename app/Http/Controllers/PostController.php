<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PhotoPost;
use App\Models\Owner;
use App\Models\User;
use App\Models\TypeHebergement;
use App\Models\Ville;
use App\Models\Departement;
use App\Models\Adresse;
use App\Models\PhotoUser;

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
        $photoPosts = PhotoPost::all();
        $photoUsers = PhotoUser::all();
        $users = User::all();
        return view ("one-post", compact('post', 'photoPosts', 'photoUsers', 'users'));
    }

    public function getPostsByCity(Request $request){

        $request->validate([
            'city' => 'required', // Adjust validation rules as needed
        ]);
        $nomville=$request->get('city');
        
        $posts = Post::whereHas('adresseAnnonce.ville', function($query) use ($nomville){
            $query->where('nomville', $nomville);
        })->get();

        $photoPosts = PhotoPost::all();
        $typeHebergements = TypeHebergement::all();

        
        return view('post-list', compact('posts', 'photoPosts', 'typeHebergements'));
    }


    public function search(Request $request)
    {
        $typeHebergements = Post::all();
        // Validate the form data as needed
        $typeHebergementId = $request->input('type_hebergement');
        
        // Vérifiez si un type d'hébergement a été sélectionné
            // Récupérez les annonces liées au type d'hébergement sélectionné
            // $annonces = Post::whereHas('typeHebergement', function ($query) use ($typeHebergementId) {
            //     $query->where('idhebergement', $typeHebergementId);
            // })->get();

            $searchResults = Post::where('idhebergement', $typeHebergementId)
            ->get();

            $posts = Post::all();
            $photoPosts = PhotoPost::all();
            $typeHebergements = TypeHebergement::all();
    
            
        // Vous pouvez maintenant utiliser $annonces comme vous le souhaitez
        // par exemple, le retourner à une vue pour l'affichage
        return view('post-list', compact('posts', 'photoPosts','typeHebergements'));
        
    }
    
    




    

    

}
