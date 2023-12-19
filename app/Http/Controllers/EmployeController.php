<?php

namespace App\Http\Controllers;
use App\Models\Employe;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeController extends Controller
{
    
    public function one($id){
        return view ("dashboard", ['employe'=>Employe::find($id)]);
    }

    public function showLoginForm()
    {
        return view('employe.login');
    }

    public function login(Request $request)
    {
        // Utilisez le guard 'employe' ici
        if (Auth::guard('employe')->attempt(['emailemploye' => $request->emailemploye, 'motdepasseemploye' => $request->motdepasseemploye])) {
            dd($employe);
            // L'utilisateur employé est authentifié avec succès
            return redirect()->intended('/dashboard');
        }
        
    
        // Échec de l'authentification, redirigez vers la page de connexion
        return redirect('/employe/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function add()
    {
        return view('employe.register');
    }


    public function register(Request $request)
    {
        
        $employe = new Employe();
        $employe->nomemploye = $request->input('Nom');
        $employe->prenomemploye = $request->input('Prenom');
        $employe->emailemploye = $request->input('emailemploye');
        $employe->motdepasseemploye = bcrypt($request->input('password'));
        $employe->datenaissanceemploye = $request->input('datenaissanceemploye');
        $employe->save();
        // Auth::guard('employe')->login($employe);
        Auth::login($employe);
        return redirect()->route('employe.dashboard');


    }
}

