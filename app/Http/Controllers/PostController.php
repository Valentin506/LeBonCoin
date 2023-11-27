<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PhotoPost;
use App\Models\Owner;
use App\Models\User;
use App\Models\TypeHebergement;

class PostController extends Controller
{

    
    public function post(){
        // $posts = Post::all();
        // $photoUsers = PhotoUser::all();
        // $owners = Owner::all();
        // $users = User::all();
    	return view ("post-list", ['posts'=> Post::all(),
                    'photoPosts'=>PhotoPost::all(),
                    'typeHebergements'=>TypeHebergement::all(),
                    'owners'=>Owner::all(),
                    'users'=>User::all()]);
    }

    public function one($id){
        return view ("one-post", ['post'=>Post::find($id) ]);
    }

    




    

    

}
