<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{

    
    public function add()
    {
        return view('add-account');
    }

    public function save(Request $request)
    {
        
        if ($request->input("email") == ""){
            return redirect('create-annonce')->withInput();
          } else {
            $b = new User;
            $b->timestamps = false;
            $b->emailcompte = $request->input("email");
            $b->motdepasse = $request->input("password");
            $b->numtelcompte = $request->input("tel");
            $b->nomcompte = $request->input("name");
            $b->prenomcompte = $request->input("firstname");
            $b->datenaissanceparticulier = $request->input("date");
            
            
            $b->save();
    
            
          
          } }
}
