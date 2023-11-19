<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Account;

class UserController extends Controller
{

    public function view(){
    	return view ("add-account", ['locataires'=>User::all() ]);
    }
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
        
        if ($request->input("email") == "")  {
            return redirect('add-account/add')->withInput();
          } else {
            $b = new Account;
            $b->timestamps = false;
            $b->emaillocataire = $request->input("email");
            $b->motdepasse = $request->input("password");
            $b->numtellocataire = $request->input("tel");
            $b->nomlocataire = $request->input("name");
            $b->prenomlocataire = $request->input("firstname");
            $b->datemembre = $request->input("date");
            $b->save();
    
            return redirect('/');
          
          } 

            
            
        ;

        /*
        Database Insert
        */
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tel' => $request->tel,
            'name' => $request->name,
            'firstname' => $request->firstname,
            'date' => $request->date,
            'adress' => $request->adress,
            'country' => $request->country,
        ]);

        return back();
    }
}