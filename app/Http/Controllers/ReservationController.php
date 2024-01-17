<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;

use App\Models\Post;
use App\Models\PhotoPost;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Bancaire;
use App\Models\Owner;
use App\Models\Reserve;
use App\Models\Calendar;



class ReservationController extends Controller
{
    public function reservation($id)
    {
        $user = auth()->user();

      
        
         
        
        $photoPosts = PhotoPost::all();
        $posts = Post::all();
        
        $post = Post::find($id);
        $calendar= Calendar::find($id);



        return view("/reservation",compact('post','photoPosts','calendar'));
    }

    

    public function save(Request $request, $id): RedirectResponse
    {
      
        $request->validate([
            'dateexpiration' => ['required', 'date', 'after:today'],[
                'dateexpiration.required' => 'La date d\'expiration est requise.',
                'dateexpiration.date' => 'La date d\'expiration doit être une date valide.',
                'dateexpiration.after' => 'La date d\'expiration doit être ultérieure à la date actuelle.'
            ]
        ]);
        
        $enregistrerDonneesBancaires = $request->input('enregistrerDonneesBancaires');



        $dateExpiration = $request->input('dateexpiration');
        $formattedDate = $dateExpiration . '-01';
        $posts = Post::all();

        $post = Post::find($id);
        $user = auth()->user();
        
            
        if ($enregistrerDonneesBancaires) {
            $bancaire = new Bancaire;
            $bancaire->idcompte = $user->idcompte;
            $bancaire->numcarte = $request->input("carte");
            $bancaire->numcvv = $request->input("cvv");
            $bancaire->dateexpiration = $formattedDate;

            $bancaire->fill([
                'numcarte' => Crypt::encryptString($bancaire->numcarte),
                'numcvv' => Crypt::encryptString($bancaire->numcvv),
                'dateexpiration' => Crypt::encryptString($bancaire->dateexpiration),
            ])->save();
            
            // $bancaire->save();
        } else {
                // Ne rien faire, car l'utilisateur ne souhaite pas enregistrer les données bancaires
            }

            $fiche = new Reservation;
            $fiche->timestamps = false;
            $fiche->idcompte = $user->idcompte;
            //$fiche->idinfobancaire = $bancaire->idinfobancaire;
            $fiche->nbadulte = $request->input("adultes");
            $fiche->nbenfant = $request->input("enfants");
            $fiche->nbbebe = $request->input("bebes");
            $fiche->nbanimaux = $request->input("animaux");
            $fiche->save();

            $reserve = new Reserve;
            $reserve->idcompte = $user->idcompte;
            $reserve->idannonce = $post->idannonce;
            $reserve->idfiche = $fiche->idfiche;
            $reserve->save();

           

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
      
        
    }}
