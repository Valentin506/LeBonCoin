<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoUserController extends Controller
{
    public function photoUser(){
    	return view ("photo-user", ['photoUsers'=>PhotoUser::all(),
                                    'users' => Post::all() ]);
    }

}
