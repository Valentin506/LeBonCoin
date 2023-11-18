<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerController extends Controller
{
    
    public function owner(){
    	return view ("owner-list", ['owners'=>Owner::all() ]);
    }
}
