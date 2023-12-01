<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;




class AuthController extends Controller
{

  
     public function showLoginForm(){
      return view('/auth/login');
     }

   public function login(Request $request){

    // dd($request->all());
    $credentials = $request->validate([
      'emailcompte' => ['required'],
      'passwd' => ['required'],
    ]);

    unset($credentials["passwd"]);
    $credentials["password"] = $request->passwd;


    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect()->intended('/');
    }

  return back()->withErrors([
      'email' => 'Mauvais identifiant ou mot de passe.',
  ]);
   }
   
   

  
   

   public function logout()
    {
          Auth::logout();

          return redirect()->route('login');
    }
}
