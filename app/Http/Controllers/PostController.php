<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function post(){
    	return view ("post-list", ['posts'=>Post::all() ]);
    }

    public function one($id){
        return view ("one-post", ['post'=>Post::find($id) ]);
    }

    public function photoUser()
    {
       return $this->belongsTo('App\Models\PhotoUser','idimage');
    }

}
