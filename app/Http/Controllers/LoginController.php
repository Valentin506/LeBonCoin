<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{

   public function login(){
        return view('auth.login');
   }

   public function doLogin(LoginRequest $request){
        $credentials = $request->validated();

        Auth::attemp($credentials);
   }
}
