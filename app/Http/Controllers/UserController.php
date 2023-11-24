<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;

class UserController extends Controller
{

    // public function view(){
    // 	return view ("add-account", ['locataires'=>User::all() ]);
    // }
    // // // public function create(Request $request)
    // // // {
    // $user = new User();     // Aucune erreur est détectée dans les champs, on peut enregistrer l'utilisateur !
    // $user->timestamps = false;
    // $user->nomutilisateur = $request->input("nomutilisateur")
    // $user->prenomutilisateur = $request->input("prenomutilisateur");
    // $user->emailutilisateur = $request->input("emailutilisateur");
    // $user->passwordutilisateur = $request->input("passwordutilisateur");
    // $user->save();

    //     Auth::login($user, $remember = false);   // La variable remember à true dépose un cookie. ça risque de pas fonctionner avec notre base

    //     return redirect('/');
    // }

    // public function index(){
    //     return view('my-account');
  
    // }
    public function one($id){
        return view ("my-account", ['user'=>User::find($id) ]);
    }

    public function add()
    {
        return view('add-account');
    }
    public function modif($id)
    {
        return view('modif-account');
    }

    public function user(){
        return view("my-account", ['users' => User::all(), 
        'photoUsers' => PhotoUser::all()]);
    }


    public function save(Request $request)
    {
        
        if ($request->input("email") == "")  {
            return redirect('add-account/add')->withInput();
          } else {
            $user = new Account;
            $user->timestamps = false;
            $user->emaillocataire = $request->input("email");
            $user->motdepasse = $request->input("password");
            $user->pseudocompte = $request->input("pseudo");
            $user->numtellocataire = $request->input("tel");
            $user->nomlocataire = $request->input("name");
            $user->prenomlocataire = $request->input("firstname");
            $user->datemembre = $request->input("date");
            $user->save();

            Auth::login($user);
            // Auth::check();
    
            return redirect('/');
          
          

            
            
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

        ]);

        return back();
        /*
        Database Update
        */
        $user = User::update([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tel' => $request->tel,
            'name' => $request->name,
            'firstname' => $request->firstname,
            'date' => $request->date,

        ]);

        return back();
        
    }
}}