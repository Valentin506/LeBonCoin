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
    // Utilize the 'employe' guard here
        if (Auth::attempt(['emailemploye' => $request->emailemploye, 'password' => $request->password])) {
            // Successful authentication for the employe user
            return redirect()->intended('/employe/dashboard');
        }

        // Authentication failed, redirect to the login page
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

