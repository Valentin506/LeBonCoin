<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    // Retrieve the currently authenticated user...
$user = Auth::user();
 
// Retrieve the currently authenticated user's ID...
$id = Auth::id();

    
    public function add()
    {
        return view('add-account');
    }
    public function connect()
    {
        return view('login');
    }

    public function save(Request $request)
    {
        
        if ($request->input("email") == ""){
            return redirect("create-account")->withInput();
          } else {
            $b = new User;
            $b->timestamps = false;
            $b->emailcompte = $request->input("email");
            $b->motdepasse = $request->input("password");
            $b->numtelcompte = $request->input("tel");
            $b->pseudocompte = $request->input("pseudo");
            $b->nomcompte = $request->input("name");
            $b->prenomcompte = $request->input("firstname");
            $b->datenaissanceparticulier = $request->input("date");
            
           

            $b->save();
            Auth::login($user, $remember = false);  
            return redirect("/");
    
            
          
          } }
}
