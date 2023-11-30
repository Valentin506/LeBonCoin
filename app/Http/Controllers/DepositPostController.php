<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\TypeHebergement;
use App\Models\CapaciteLogement;

class DepositPostController extends Controller
{
    public function post(){
        return view("deposit-post", ['posts'=>Post::all(), 'typeHebergements'=>TypeHebergement::all(),'capacitelogements'=>CapaciteLogement::all()]);
    }

    public function publish(Request $request)
    {
        $typeHebergements = Post::all();
        // Validate the form data as needed
        $typeHebergementId = $request->input('type_hebergement');
        
       
        
    }
    
    
}

