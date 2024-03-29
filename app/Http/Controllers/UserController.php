<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Adresse;
use App\Models\Ville;
use App\Models\Owner;
use App\Models\Region;
use App\Models\Departement;
use App\Models\PhotoUser;
use App\Models\Post;
use App\Models\PhotoPost;
use App\Models\TypeHebergement;
use App\Models\Calendar;
use App\Models\Reservation;
use App\Models\Reserve;



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
    public function modifAccount($id)
    {
        return view('modif-account', ['user'=>User::find($id)]);
    }
    public function modifProfile($id)
    {
        return view('modif-profile', ['user'=>User::find($id)]);
    }

    
    public function modifSecurite($id)
    {
        return view('modif-securite', ['user'=>User::find($id)]);
    }

    


    public function bookings($id)
    {
        $user = auth()->user();
        $photoPosts = PhotoPost::all();
        $posts = Post::find($id);
        

        $bookings = Reservation::where('idcompte', $user->idcompte)->get();
        $res = Reserve::where('idcompte', $user->idcompte)->get();
        return view('my-bookings', [
            'user' => $user,
            'bookings' => $bookings,
            'ress' => $res],
        compact('photoPosts','posts'));
       }
       
    // MODIFICATION POST
    public function modifPost($id){

        $user = User::find($id);
        $posts = Post::all();
        $owner = Owner::find($id);
        $calendars = Calendar::all();
        $photoPosts = DB::table('photo')
                    ->join('annonce', 'annonce.idannonce','=','photo.idannonce')
                    ->join('proprietaire','proprietaire.idproprietaire','=','annonce.idproprietaire')
                    ->join('compte','compte.idcompte','=','proprietaire.idcompte')
                    ->get();
        // dd($photoPosts);
        $calendar = DB::table('calendrier')
                    ->join('annonce','annonce.idannonce','=','calendrier.idannonce')
                    ->get();

        return view('modif-post', compact('user','posts','owner','photoPosts','calendars','calendar'));
    }

    // UPDATE POST
    public function updatePost(Request $request){
        
       
        $request->validate([
            'addPhotoPost' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $idPost=$request->get('idannonce');
        $post = Post::find($idPost);
        // dd($post);
        
        if ($request->hasFile('addPhotoPost')){
            $photoUpload= $request->file('addPhotoPost')->getClientOriginalName();
            $request->file('addPhotoPost')->move(public_path('images'), $photoUpload);
            $photoPost = new PhotoPost(['image'=> $photoUpload]);
            $photoPost->idannonce = $request->get("idannonce");
            $photoPost-> save();
            $post->save();
        }


        return redirect('/');
    }

    public function updateDisponibilite(Request $request)
    {
        

        $selectDispo=$request->get('selectDispo');
        $idPost=$request->get('idannonce');
        $post = Post::find($idPost);
        // dd($post);

        if ($post) {
            if ($selectDispo == 'Disponible') {
                foreach ($post->calendar as $calendar) {
                    if (!$calendar->disponibilite) {
                        $calendar->disponibilite = true;
                        $calendar->save();
                    }
                }
            } else if ($selectDispo == 'Indisponible') {
                foreach ($post->calendar as $calendar) {
                    if ($calendar->disponibilite) {
                        $calendar->disponibilite = false;
                        $calendar->save();
                    }
                }
            }
        }
        return redirect ('/');
    
        
    }


    public function user(){
        return view("my-account", ['users' => User::all(), 
        'photoUsers' => PhotoUser::all(), 'owners'=>Owner::all()]);
    }
    
    public function favoris()
    {
        // Assurez-vous que l'utilisateur est authentifié
        if (Auth::check()) {
            $user = Auth::user();

            // Récupérez les favoris de l'utilisateur
            $favorites = $user->favoris;

            // Récupérez les posts associés aux favoris
            $posts = $favorites->map(function ($favorite) {
                return $favorite->post;
            });

            // Le reste de votre code reste inchangé
            return view("favorite", [
                'user' => $user,
                'posts' => $posts,
                'photoPosts' => PhotoPost::all(),
                'owners' => Owner::all(),
                'typeHebergements' => TypeHebergement::all(),
                'cities' => Ville::all(),
                'departments' => Departement::all(),
                'users' => User::all(),
                'favorites' => $favorites,
            ]);
        }

        // Si l'utilisateur n'est pas authentifié, vous pouvez rediriger ou prendre une autre action
        return redirect('/');
    }



    

    

    // public function redirectToProfile($id) {
    //     // Récupérer l'utilisateur actuel
    //     $owner = Owner::where('idcompte', $user -> idcompte)->first();
    //     // Vérifier si l'utilisateur a déjà un owner associé
    //     $owner = User::where('idcompte', $user->idcompte)->first();
    
    //     if ($owner ===null) {
    //         // Si $owner n'existe pas, créer un nouvel utilisateur avec le même idproprietaire
    //         $owner = new Owner();
    //         $owner->idcompte = $user->idcompte;
    //         $owner->idproprietaire = $user->idcompte; // Assurez-vous que votre modèle User a une colonne idproprietaire
    //         // Vous pouvez également initialiser d'autres champs si nécessaire
    //         $owner->save();
    //     }
    
    //     // Rediriger vers l'URL spécifiée
    //     return redirect()->to("profile/{$owner->idcompte}");
    // }
    

    public function updateSecurite(Request $request){
        // $request->validate([
        //     'motdepasse' => [
        //         'required',
        //         'string',
        //         'min:12', // par exemple, au moins 8 caractères
        //         'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!/*?&])[A-Za-z\d@$!*?&]+$/'
        //     ]
           
        // ]);
        if ($request->input("motdepasse") == "")  {
            
            return redirect('modif-securite')->withInput();
        } else {

            $user = Auth::user();

            if(!empty($request->input("motdepasse"))){

                $user->motdepasse = bcrypt($request->input("motdepasse"));
            }
            $user->update();
            return redirect('/');


        }

        
    }
    public function updateProfile(Request $request){
        $user = Auth::user();
        
        $request->validate([
            'pseudocompte' => [
            'required',
            'string', 
            Rule::unique('compte')->ignore($user->idcompte, 'idcompte') ], 
            'nouvellePhoto' => 'nullable|image|mimes:jpeg,png,jpg,gif', ]);
        if ($request->input("pseudocompte") == "")  {
            
            return redirect('modif-profile')->withInput();
        } 
        else {

            

            $user->pseudocompte = $request->input("pseudocompte"); 

            if ($request->hasFile('nouvellePhoto')) {
                // $photoPath = $request->file('nouvellePhoto')->store('images');

                // dd($request->file('nouvellePhoto'));
                $photo = $request->file('nouvellePhoto')->getClientOriginalName();
                $request->file('nouvellePhoto')->move(public_path('images'), $photo);
                $photoUser = new PhotoUser(['urlphotoprofil' => $photo]);
                // dd($photo);
                $photoUser->save();
                
                $user->idphotoprofil=$photoUser->idphotoprofil;
                $user->save();
                
            }


            $user->update();
            return redirect('/');


        }

        
    }

    public function updateAccount(Request $request){
        $user = Auth::user();
        
        $request->validate([
            'datenaissanceparticulier' => ['required', 'date', 'before:today'], 
            'emailcompte' => [
                'string', 
                Rule::unique('compte')->ignore($user->emailcompte, 'emailcompte')]
        ]);
        if ($request->input("nomcompte") == "")  {
            
            return redirect('modif-account')->withInput();
        }
        
        else {

            

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
            
            

            $user->update();
            return redirect('/');


          }


    }


    public function save(Request $request)
    {

        $request->validate([
            'password' => [
                'required',
                'string',
                'min:12',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\/])[A-Za-z\d@$!%*?&\/]+$/'
            ]
        
           
        ],[
            'password.regex' => 'Le mot de passe doit respecter les critères suivants :'
            . "\n. Au moins 12 caractères."
            . "\n. Au moins une lettre minuscule."
            . "\n. Au moins une lettre majuscule."
            . "\n. Au moins un chiffre."
            . "\n. Au moins un caractère spécial parmi @$!%*?&/\.'",
        ]);

        

       
        if (User::where("emailcompte", "=", $request->input("email"))->count() > 0) {
            return redirect('create-account')
                ->withInput()
                ->withErrors(['email' => 'L\'adresse e-mail existe déjà. Veuillez en choisir une autre.']);
        } elseif (User::where("numtelcompte", "=", $request->input("tel"))->count() > 0) {
            return redirect('create-account')
                ->withInput()
                ->withErrors(['tel' => 'Ce numéro de téléphone existe déjà. Veuillez en choisir un autre.']);
        }elseif (User::where("motdepasse", "=", $request->input("password"))->count() > 0) {
            return redirect('create-account')
                ->withInput()
                ->withErrors(['password' => 'Le mot de passe doit contenir \\n1 Majuscule \\n1 caractère spécial.']);
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
            $adresse->numero = $request->input("numero");
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