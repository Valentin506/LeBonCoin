<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeController extends Controller
{
    public function showLoginForm()
    {
        return view('employe.login');
    }

    public function login(Request $request)
    {
        // Utilisez le guard 'employe' ici
        if (Auth::guard('employe')->attempt(['emailemploye' => $request->email, 'password' => $request->password])) {
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
}

