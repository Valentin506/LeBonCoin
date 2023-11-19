<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function post(){
    	return view ("post-list", ['posts'=>Post::all() ]);
    }

    public function view($id){
        return view ("post-view", ['post'=>Post::findOrFail($id) ]);
    }
}
