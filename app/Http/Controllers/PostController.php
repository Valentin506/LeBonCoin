<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PhotoUser;
use App\Models\Owner;
use App\Models\User;

class PostController extends Controller
{

    
    public function post(){
        // $posts = Post::all();
        // $photoUsers = PhotoUser::all();
        // $owners = Owner::all();
        // $users = User::all();
    	return view ("post-list", ['posts'=> Post::all(),
                    'photoUsers'=>PhotoUser::all(),
                    'owners'=>Owner::all(),
                    'users'=>User::all()]);
    }

    public function one($id){
        return view ("one-post", ['post'=>Post::find($id) ]);
    }




    

    

}
