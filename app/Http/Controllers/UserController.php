<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // public function create(Request $request)
    // {
    //     $user = new User();     // Aucune erreur est détectée dans les champs, on peut enregistrer l'utilisateur !
    //     $user->timestamps = false;
    //     $user->nomutilisateur = $request->input("nomutilisateur");
    //     $user->prenomutilisateur = $request->input("prenomutilisateur");
    //     $user->emailutilisateur = $request->input("emailutilisateur");
    //     $user->passwordutilisateur = $request->input("passwordutilisateur");
    //     $user->save();

    //     Auth::login($user, $remember = false);   // La variable remember à true dépose un cookie. ça risque de pas fonctionner avec notre base

    //     return redirect('/');
    // }
    public function create()
    {
        return view('auth.add-account');
    }

    public function store(Request $request)
    {
    }
}