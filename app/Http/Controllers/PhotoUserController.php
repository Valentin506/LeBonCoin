<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhotoUser;

class PhotoUserController extends Controller
{
    public function photoUser(){
    	return view ("photo-list", ['photoUsers'=>PhotoUser::all() ]);
    }


}
