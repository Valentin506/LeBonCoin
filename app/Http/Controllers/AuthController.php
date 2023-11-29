<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;




class AuthController extends Controller
{

   public function login(){
        return view('auth.login');
   }
   
   

  
   public function doLogin(LoginRequest $request){

        $credentials = $request->validated();
        dd(Auth::attempt($credentials));
        //dd(Auth::login($credentials));
        
   }

   public function logout()
    {
          Auth::logout();

        return redirect('/');
    }
}
