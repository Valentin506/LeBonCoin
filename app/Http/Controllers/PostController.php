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
    $typeHebergementId = $request->input('type_hebergement');

    // Effectuez la logique de recherche en fonction de $typeHebergementId
    // Utilisez Eloquent ou le constructeur de requêtes pour interroger la base de données
    $posts = Post::whereHas('typehebergement', function($query) use ($typeHebergementId){
        $query->where('typehebergement', $typeHebergementId);
    })->get();

    // Retournez les résultats de la recherche à la vue
    $results = Post::where('idhebergement', $typeHebergementId)->get();

    return view('post-list', compact('posts', 'typeHebergements'));
}

    
    




    

    

}
