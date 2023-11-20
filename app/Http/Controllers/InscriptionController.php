<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfessionnel;
use App\Models\UserParticulier;

class InscriptionController extends Controller
{
    public function create()
    {
        return view('inscription');
    }

    public function store(Request $request)
    {
        $type = $request->input('type');

        if ($type == 'professionnel') {
            UserProfessionnel::create($request->only(['email', 'telephone', 'password', 'nom', 'siret', 'societe', 'adresse', 'ville', 'secteur']));
        } else {
            UserParticulier::create($request->only(['email', 'telephone', 'password', 'nom']));
        }

        return "Inscription réussie!";
    }
}
