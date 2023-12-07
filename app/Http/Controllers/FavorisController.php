<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Adresse;
use App\Models\Ville;
use App\Models\Owner;
use App\Models\Region;
use App\Models\Departement;
use App\Models\PhotoUser;
use App\Models\Post;


class FavorisController extends Controller
{
    public function fav()
    {
        
        return view('favorite');
    }
    
    public function save($idpost)
    {
        // Récupérez l'utilisateur authentifié
        $user = Auth::user();

        // $existingFavorite = Favorite::where('idcompte', $user->idcompte)
        //     ->where('idannonce', $idpost)
        //     ->first();

        // if (!$existingFavorite) {
            // Si ce n'est pas déjà en favoris, ajoutez une nouvelle entrée
            $favorite = new Favorite();
            $favorite->idcompte = $user->idcompte;
            $favorite->idannonce = $post->idannonce;
            $favorite->save();
        // }

        return redirect()->back()->with('success', 'Annonce ajoutée aux favoris avec succès');
    }
}
