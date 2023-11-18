<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerController extends Controller
{
    
    public function profile(){
    	return view ("owner-list", ['profiles'=>Owner::all() ]);
    }
}
