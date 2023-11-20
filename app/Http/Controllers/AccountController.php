<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
   
    
    
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

            
             
            if (Auth::attempt($b)) {
                $request->session()->regenerate();
     
                return redirect()->intended('connect-account');
            }
     
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

            
            
            return redirect("/");
    
            
          
          } 
        
        
        }

