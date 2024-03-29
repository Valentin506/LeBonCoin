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
use App\Models\Calendar;
use App\Models\PhotoPost;

class DepositPostController extends Controller
{
    public function post(){
        return view("deposit-post", ['posts'=>Post::all(), 'typeHebergements'=>TypeHebergement::all(),'capacitelogements'=>CapaciteLogement::all(),'equipements'=>Equipement::all(),'serviceaccessibilittes'=>ServiceAccessibilite::all(),'possess'=>Possess::all(), 'hold'=>Hold::all(), 'photoPost'=>PhotoPost::all(),'photos'=>PhotoPost::all()]);
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
        
                $user = auth()->user();
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
                $post -> prix = $request->input("price");

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
            
            

                //possede equipements
                foreach ($request->input("equipement2") as $idequipement){
                    
                    $possess = new Possess;
                    $possess -> idequipement = $idequipement;
                    $possess ->  idannonce = $post -> idannonce;
    
                    $possess->save();
                }
                

                //detient services
                foreach ($request->input("service") as $idservice )
                {

                    $hold = new Hold;
                    $hold -> idservice = $idservice;
                    $hold ->  idannonce = $post -> idannonce;
    
                    $hold->save();
                }

                //calendar
                $calendar = new Calendar;
                $calendar -> prixpardate = $request ->input("price");
                $calendar ->  idannonce = $post -> idannonce;
                $calendar ->save();

                
                //picture
                       
                            foreach ($request->file('images') as $photo) {
                                $photoName = $photo->getClientOriginalName();

                                $photo->move(public_path('images'), $photoName);
                                // Créez une nouvelle instance de PhotoPost et liez-la à l'annonce actuelle
                                $photoPost = new PhotoPost(['image' => $photoName]);
                                
                                // Récupérez l'id de l'annonce après l'avoir enregistrée
                                $post->save();
                                $photoPost->idannonce = $post->idannonce;
                        
                                $photoPost->save();
                                
                                
                            
                            } 
                            
        return redirect('/');   
    }


    public function add()
    {
        return view('deposit-post');    
    }
}

