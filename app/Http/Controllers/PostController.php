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
        return view ("one-post", ['post'=>Post::find($id) ]);
    }

    public function getPostsByCity(Request $request){
        $nomville=$request->get('city');
        dd($nomville);
        $posts = Post::whereHas('adresseAnnonce.ville', function($query) use ($nomville){
            $query->where('nomville', $nomville);
        })->get();

        return view('post-list', compact('posts'));
    }

    




    

    

}
