<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\User;
use App\Models\Post;
use App\Models\PhotoPost;

class OwnerController extends Controller
{
    
    public function owner(){
    	return view ("owner-list", ['owners'=>Owner::all(),
                                    'users'=>User::all()]);
    }

    public function one($id){

        $owner = Owner::find($id);
        $posts = Post::where('idproprietaire', $owner->idproprietaire)->get();
        $photoPosts = PhotoPost::all();
        $user = User::find($id);
        return view ("one-profile", compact('owner','posts','photoPosts','user'));
    }

}
