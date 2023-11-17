<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Account;

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
    public function add()
    {
        return view('add-account');
    }

    public function save(Request $request)
    {
        
        if ($request->input("titre") == "")  {
            return redirect('annonce/add')->withInput();
          } else {
            $b = new Annonce;
            $b->timestamps = false;
            $b->titre = $request->input("titre");
            $b->description = $request->input("description");
            $b->nombrepiece = $request->input("nombrepiece");
            $b->prix = $request->input("prix");
            $b->save();
    
            return redirect('annonces');
          
          } 

            
            
        ;

        /*
        Database Insert
        */
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back();
    }
}