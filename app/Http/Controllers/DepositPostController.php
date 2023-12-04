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

class DepositPostController extends Controller
{
    public function post(){
        return view("deposit-post", ['posts'=>Post::all(), 'typeHebergements'=>TypeHebergement::all(),'capacitelogements'=>CapaciteLogement::all(),'equipements'=>Equipement::all(),'serviceaccessibilittes'=>ServiceAccessibilite::all()]);
    }

    public function publish(Request $request)
    {
        $typeHebergements = Post::all();
        // Validate the form data as needed
        $typeHebergementId = $request->input('type_hebergement');
        
       
        
    }
    
    public function save(Request $request)
    {
        $typeHebergements = Post::all();
        

        
    //if (titre == null) {



        
        //     if (User::where("emailcompte", "=", $request->input("email"))->count() > 0) {
        //         return redirect('create-account')
        //             ->withInput()
        //             ->withErrors(['email' => 'L\'adresse e-mail existe déjà. Veuillez en choisir une autre.']);
        //     } elseif (User::where("numtelcompte", "=", $request->input("tel"))->count() > 0) {
        //         return redirect('create-account')
        //             ->withInput()
        //             ->withErrors(['tel' => 'Ce numéro de téléphone existe déjà. Veuillez en choisir un autre.']);
        //     }elseif (User::where("motdepasse", "=", $request->input("password"))->count() > 0) {
        //         return redirect('create-account')
        //             ->withInput()
        //             ->withErrors(['password' => 'Le mot de passe doit contenir \\n1 Majuscule \\n1 caractère spécial.']);
        //     }
        //      elseif (User::where("pseudocompte", "=", $request->input("pseudo"))->count() > 0) {
        //     return redirect('create-account')
        //         ->withInput()
        //         ->withErrors(['pseudo' => 'Ce pseudo existe déjà. Veuillez en choisir un autre.']);
        // }
        





        
        
    //else{

                $post = new Post;
                $post -> titreannonce = $request -> input("title"); 
                $idhebergement = $request->input("type_hebergement");
                $post -> idhebergement = $idhebergement;
                $idproprietaire = 1; //$request->input("type_hebergement");
                $post -> idproprietaire = $idproprietaire;
                $idcapacite = $request->input("capacite_hebergement");
                $post -> idcapacite = $idcapacite;
                $idcapacite = $request->input("capacite_hebergement");
                $post -> idcapacite = $idcapacite;
                $post -> description = $request->input("add_description");
                $post -> paiementenligne = $request->input("mode_paiement");
                


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
                $post -> idadresse = $adresse;
                $adresse->save();
                
                
                $post->save();

                


            //     $user = new User;
            //     $user->timestamps = false;
            //     $user->emailcompte = $request->input("email");
            //     $user->motdepasse = bcrypt($request->input("password"));
            //     $user->pseudocompte = $request->input("pseudo");
            //     $user->numtelcompte = $request->input("tel");
            //     $user->nomcompte = $request->input("name");
            //     $user->prenomcompte = $request->input("firstname");
            //     $user->idadresse = $adresse->idadresse;
            //     $ville->idville = $request->input("ville");
                
                

                
            //     $user->save();    
            //     return redirect('/');
            
            

                
                
            // ;

            // /*
            // Database Insert
            // */
            // $user = User::create([
            //     'email' => $request->email,
            //     'password' => Hash::make($request->password),
            //     'tel' => $request->tel,
            //     'name' => $request->name,
            //     'firstname' => $request->firstname,
            //     'date' => $request->date,
            //     'adresse' => $request->address,

            // ]);

            // return back();
            /*
            Database Update
            // */
            // $user = User::update([
            //     'email' => $request->email,
            //     'password' => Hash::make($request->password),
            //     'tel' => $request->tel,
            //     'name' => $request->name,
            //     'firstname' => $request->firstname,
            //     'date' => $request->date,
            //     'adresse' => $request->address,

            // ]);

             return redirect('/');
        
    }

    

   
    public function add()
    {
        return view('deposit-post');
    }
    
}

