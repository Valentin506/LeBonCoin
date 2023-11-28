<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Adresse;
use App\Models\Ville;
use App\Models\Owner;
use App\Models\Region;
use App\Models\Departement;


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
        return view ("my-account", ['user'=>User::find($id)]);
    }

    public function add()
    {
        return view('add-account');
    }
    public function modif($id)
    {
        return view('modif-account', ['user'=>User::find($id)]);
    }

    public function user(){
        return view("my-account", ['users' => User::all(), 
        'photoUsers' => PhotoUser::all(), 'owners'=>Owner::all()]);
    }

    public function update(Request $request){
        $request->validate([
            'datenaissanceparticulier' => ['required', 'date', 'before:today'],
            'motdepasse' => ['nullable', 'string', 'min:12']
        ]);
        if ($request->input("nomcompte") == "")  {
            
            return redirect('modif-account')->withInput();
          } else {

            
            
            $user = Auth::user();

            if(!empty($request->input("adresse"))){
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
                $adresse->idville = $ville->idville;
                $adresse->save();
                $user->idadresse = $adresse->idadresse;
                $ville->idville = $request->input("ville");

            }


            $user->sexe = $request->input("sexe");    
            $user->nomcompte = $request->input("nomcompte");
            $user->prenomcompte = $request->input("prenomcompte");
            $user->datenaissanceparticulier = $request->input("datenaissanceparticulier");
            $user->emailcompte = $request->input("emailcompte");
            if(!empty($request->input("motdepasse"))){

                $user->motdepasse = bcrypt($request->input("motdepasse"));
            }
            

            $user->update();
            return redirect('/');


          }


    }


    public function save(Request $request)
    {

       
        if (User::where("emailcompte", "=", $request->input("email"))->count() > 0) {
            return redirect('create-account')
                ->withInput()
                ->withErrors(['email' => 'L\'adresse e-mail existe déjà. Veuillez en choisir une autre.']);
        } elseif (User::where("numtelcompte", "=", $request->input("tel"))->count() > 0) {
            return redirect('create-account')
                ->withInput()
                ->withErrors(['tel' => 'Ce numéro de téléphone existe déjà. Veuillez en choisir un autre.']);
        }
         elseif (User::where("pseudocompte", "=", $request->input("pseudo"))->count() > 0) {
        return redirect('create-account')
            ->withInput()
            ->withErrors(['pseudo' => 'Ce pseudo existe déjà. Veuillez en choisir un autre.']);
    }






    
else{
        
        
       


            
            // $departement->$numerodep = $request->input("codepostal");
            // $departement->save();

           
            //  $numerodep = substr($request -> codepostal,0,2);
            // $depname = Departement::find($numerodep)->nomdepartement;
            
            

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
            $adresse->idville = $ville->idville;
            $adresse->save();


            


            $user = new User;
            $user->timestamps = false;
            $user->emailcompte = $request->input("email");
            $user->motdepasse = bcrypt($request->input("password"));
            $user->pseudocompte = $request->input("pseudo");
            $user->numtelcompte = $request->input("tel");
            $user->nomcompte = $request->input("name");
            $user->prenomcompte = $request->input("firstname");
            $user->idadresse = $adresse->idadresse;
            $ville->idville = $request->input("ville");
            
            

            
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
            'adresse' => $request->address,

        ]);

        return back();
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

        // return back();
        
    }}

   
}