<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PhotoUser;
use App\Models\Owner;

class PostController extends Controller
{

    
    public function post(){
        $photoUsers = PhotoUser::all();
        $owners = Owner::all();
        $posts = Post::all();
    	return view ("post-list", compact('posts','photoUsers','owners'));
    }

    public function one($id){
        return view ("one-post", ['post'=>Post::find($id) ]);
    }




    

    

}
