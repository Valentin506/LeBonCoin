<?php

namespace App\Http\Controllers;
use App\Models\Equipement;

use Illuminate\Http\Request;

class EquipementController extends Controller
{
    public function index()
    {
        $equipements = Equipement::all();
        return view('equipements.index', compact('equipements'));
    }
    public function create()
    {
        return view('equipements.create'); // Remplacez le nom de la vue par le vôtre
    }
    public function store(Request $request)
    {
        $equipement = new Equipement();
        $equipement->libelleequipement	 = $request->input('libelleequipement');
        $equipement->save();

        return redirect()->route('equipements.index')->with('success', 'Equipement ajouté avec succès.');
    }
}
