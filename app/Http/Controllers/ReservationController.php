<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PhotoPost;
use App\Models\User;

class ReservationController extends Controller
{
    public function reservation()
    {
        // $posts = Post::all();
        
        $photoPosts = PhotoPost::all();
        $posts = Post::where('idcompte',idcompte)->get();

        return view("/reservation",compact('posts','photoPosts'));
    }
}
