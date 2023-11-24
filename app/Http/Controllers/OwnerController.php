<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\User;

class OwnerController extends Controller
{
    
    public function owner(){
    	return view ("owner-list", ['owners'=>Owner::all(),
                                    'users'=>User::all()]);
    }

    public function one($id){
        return view ("one-profile", ['owner'=>Owner::find($id) ]);
    }

}
