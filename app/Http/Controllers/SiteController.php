<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PhotoUser;
use App\Models\Owner;

class SiteController extends Controller
{
    public function index() {
        return view("welcome", ["todaysPost" => Post::inRandomOrder()->first() ]);
    }

    public function photoRandom() {
        return view("view-profile", ["todaysPhoto" => PhotoUser::inRandomOrder()->first() ]);
    }

    public function ownerRandom(){
        return view("view-profile", ["todaysOwner" => Owner::inRandomOrder()->first() ]);
    }

}
