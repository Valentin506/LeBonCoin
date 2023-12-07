<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\TypeHebergement;
use App\Models\CapaciteLogement;
use App\Models\Equipement;
use App\Models\ServiceAccessibilite;
use App\Models\User;
use App\Models\Ville;
use App\Models\Adresse;
use App\Models\Owner;
use Illuminate\Support\Facades\Auth;
use App\Models\Possess;
use App\Models\Hold;


class DepositPostController extends Controller
{
    public function post(){
        return view("deposit-post", ['posts'=>Post::all(), 'typeHebergements'=>TypeHebergement::all(),'capacitelogements'=>CapaciteLogement::all(),'equipements'=>Equipement::all(),'serviceaccessibilittes'=>ServiceAccessibilite::all(),'possess'=>Possess::all(), 'hold'=>Hold::all()]);
    }

    public function publish(Request $request)
    {
        $typeHebergements = Post::all();
        // Validate the form data as needed
        $typeHebergementId = $request->input('type_hebergement');
        

        
       
        
    }

    public function one($id){
        return view ("my-account", ['user'=>User::find($id)]);
    }
    

    public function save(Request $request)
    {
        $typeHebergements = Post::all();
        $user = Auth::user();
        
       
        

        
    // if (Post::where("titreannonce", "=", $request -> input("title")) -> count() > 0 ) {
    //     return redirect()->route('deposit-post')
    //         ->withInput()
    //         ->withErrors(['title' => 'Veuillez renseigner ce champ']);

    //     }
    // elseif (Post::where("idhebergement", "=", $request -> input("type_hebergement")) == null) {
    //     return redirect()->route('deposit-post')
    //         ->withInput()
    //         ->withErrors(['type_hebergement' => 'Veuillez renseigner ce champ']);
    //     }
        
    //     //     if (User::where("emailcompte", "=", $request->input("email"))->count() > 0) {
    //     //         return redirect('create-account')
    //     //             ->withInput()
    //     //             ->withErrors(['email' => 'L\'adresse e-mail existe déjà. Veuillez en choisir une autre.']);
    //     //     } elseif (User::where("numtelcompte",     "=", $request->input("tel"))->count() > 0) {
    //     //         return redirect('create-account')
    //     //             ->withInput()
    //     //             ->withErrors(['tel' => 'Ce numéro de téléphone existe déjà. Veuillez en choisir un autre.']);
    //     //     }elseif (User::where("motdepasse", "=", $request->input("password"))->count() > 0) {
    //     //         return redirect('create-account')
    //     //             ->withInput()
    //     //             ->withErrors(['password' => 'Le mot de passe doit contenir \\n1 Majuscule \\n1 caractère spécial.']);
    //     //     }
    //     //      elseif (User::where("pseudocompte", "=", $request->input("pseudo"))->count() > 0) {
    //     //     return redirect('create-account')
    //     //         ->withInput()
    //     //         ->withErrors(['pseudo' => 'Ce pseudo existe déjà. Veuillez en choisir un autre.']);
    //     // }
        





        
        
    // else{
                
            //    Annonces
                $post = new Post;
                $post -> titreannonce = $request->input("title");
                $idhebergement = $request->input("type_hebergement");
                $post -> idhebergement = $idhebergement;

                $owner = Owner::where('idcompte', $user -> idcompte)->first();

                if ($owner === null)
                {
                    $owner = new Owner;
                    $owner -> idcompte = $user -> idcompte;
                    $owner -> save();
                }

                
                $post -> idproprietaire = $owner -> idproprietaire;
                $idcapacite = $request->input("capacite_hebergement");
                $post -> idcapacite = $idcapacite;
                $post -> description = $request->input("description");
                $post -> paiementenligne = $request->input("typeres");

                if ($post -> paiementenligne = $request->input("typeres") == "S")
                    $post -> paiementenligne = true;
                else
                    $post -> paiementenligne = false;


                $ville = new Ville;
                $ville->timestamps = false;
                $ville->nomville = $request->input("ville");
                $codepostal = $request->input("codepostal");
                $ville ->codepostal = (int) $codepostal;
                $iddepartement = substr($request->input("departement"), 0, 2);
                $ville->iddepartement = (int) $iddepartement;
                $ville->save();

                $adresse = new Adresse;
                $adresse->timestamps = false;
                $adresse->rue = $request->input("rueclient");
                $adresse->numero = (int)$request->input("numero");
                $adresse->idville = $ville->idville;

                $adresse->save();

                $post -> idadresse = $adresse -> idadresse;
                $post->save();
            
            //dd($request->input("equipement2"));

                //detient equipements
                foreach ($request->input("equipement2") as $idequipement){
                    
                    $possess = new Possess;
                    $possess -> idequipement = $idequipement;
                    $possess ->  idannonce = $post -> idannonce;
    
                    $possess->save();
                }
                

                //detient services
                foreach ($request->input("equipement2") as $idservice )
                {

                    $hold = new Hold;
                    $hold -> idservice = $idservice;
                    $hold ->  idannonce = $post -> idannonce;
    
                    $hold->save();
                }
                
                

             return redirect('/');
        
    }

    

   
    public function add()
    {
        return view('deposit-post');
    }
    
}

