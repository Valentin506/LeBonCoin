<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhotoPost;

class PhotoPostController extends Controller
{
    public function photoPost(){
    	return view ("photo-list", ['photoPosts'=>PhotoPost::all(),
                                    'posts' => Post::all() ]);
    }

    

}
