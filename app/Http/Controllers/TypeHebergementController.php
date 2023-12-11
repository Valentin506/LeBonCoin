<?php

namespace App\Http\Controllers;

use App\Models\TypeHebergement;
use Illuminate\Http\Request;

class TypeHebergementController extends Controller
{

    public function index()
    {
        $typesHebergements = TypeHebergement::all();
        return view('types-hebergements.index', compact('typesHebergements'));
    }
    public function create()
    {
        return view('types-hebergements.create'); // Remplacez le nom de la vue par le vôtre
    }
    public function store(Request $request)
    {
        $typeHebergement = new TypeHebergement();
        $typeHebergement->libelletypehebergement = $request->input('libelletypehebergement');
        $typeHebergement->save();

        return redirect()->route('types-hebergements.index')->with('success', 'Type d\'hébergement ajouté avec succès.');
    }


    
}

