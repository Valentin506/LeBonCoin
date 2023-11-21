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
    //    return $this->belongsTo('App\Models\PhotoUser','idimage');

    $posts = Post::with('image')->get();
    dd($posts);
    return view('post-list', compact('posts'));
    }
    // public function proprietaireAnnonce()
    // {
    // //    return $this->belongsTo('App\Models\PhotoUser','idimage');

    // $postes = Post::with('image')->get();
    // dd($annonces);
    // return view('post-list', compact('annonces'));
    // }

}
