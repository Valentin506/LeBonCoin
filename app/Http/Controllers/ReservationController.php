<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PhotoPost;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Bancaire;
use App\Models\Owner;

class ReservationController extends Controller
{
    public function reservation($id)
    {
        $user = auth()->user();

      
        
         
        
        $photoPosts = PhotoPost::all();
        $posts = Post::all();
        
        $post = Post::find($id);


        return view("/reservation",compact('post','photoPosts'));
    }

    // public function one($id){
    //     $post = Post::find($id);
    //     $posts = Post::all();
    //     $photoPosts = PhotoPost::all();
    //     $photoUser = PhotoUser::find($id);
    //     $owner = Owner::find($id);
    //     $user = User::find($id);
    //     $equipements = Equipement::all();
    //     $calendar = Calendar::find($id);
        
        
        
    //     // $availability = DB::table('calendrier')
    //     //                 ->join('annonce','annonce.idannonce','=','calendrier.idannonce')
    //     //                 ->where('periodedebut','<=',$dateArrive)
    //     //                 ->where('periodefin','>=', $dateDepart)
    //     //                 ->where('disponibilite', true)
    //     //                 ->get();

    //     // $availability = Calendar::where('periodedebut', '<=', $dateArrive)
    //     //                 ->where('periodefin','>=',$dateDepart)
    //     //                 ->where('disponibilite', true)
    //     //                 ->get();

    //     return view ("one-post", compact('post', 'posts', 'photoPosts', 'photoUser','owner', 'user', 'equipements', 'calendar'));
    // }

    public function save(Request $request)
    {



        $dateExpiration = $request->input('dateexpiration');
        $formattedDate = $dateExpiration . '-01';
   
            $user = auth()->user();
            

            // $bancaire = new Bancaire;
            // $bancaire->idcompte = $user->idcompte;
            // $bancaire->numcarte = $request->input("carte");
            // $bancaire->numcvv = $request->input("cvv");
            // $bancaire->dateexpiration = $formattedDate;
            
            // $bancaire->save();

            $fiche = new Reservation;
            $fiche->timestamps = false;
            $fiche->idcompte = $user->idcompte;
            //$fiche->idinfobancaire = $bancaire->idinfobancaire;
            $fiche->nbadulte = $request->input("adultes");
            $fiche->nbenfant = $request->input("enfants");
            $fiche->nbbebe = $request->input("bebes");
            $fiche->nbanimaux = $request->input("animaux");
            $fiche->save();

            

           

            // $adresse = new Adresse;
            // $adresse->timestamps = false;
            // $adresse->rue = $request->input("rueclient");
            // $adresse->numero = $request->input("numero");
            // $adresse->idville = $ville->idville;
            // $adresse->save();


            


            // $user = new User;
            // $user->timestamps = false;
            // $user->emailcompte = $request->input("email");
            // $user->motdepasse = bcrypt($request->input("password"));
            // $user->pseudocompte = $request->input("pseudo");
            // $user->numtelcompte = $request->input("tel");
            // $user->nomcompte = $request->input("name");
            // $user->prenomcompte = $request->input("firstname");
            // $user->idadresse = $adresse->idadresse;
            // $ville->idville = $request->input("ville");
            
            

            
            // $user->save();

            // Auth::login($user);
            // // Auth::check();
    
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
      
        
    }}
