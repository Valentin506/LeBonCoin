<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhotoPost;
use App\Models\Post;

class PhotoPostController extends Controller
{
    public function photoPost(){
    	return view ("photo-list", ['photoPosts'=>PhotoPost::all(),
                                    'posts' => Post::all() ]);
    }

    

}
