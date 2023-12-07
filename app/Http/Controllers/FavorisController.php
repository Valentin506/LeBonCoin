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
    
    public function save(Request $request)
    {

        $user = Auth::user();
        $post = Post::find($id);
        $favoris = new Favorite;
        $favoris ->idcompte = $user->idcompte;
        $favoris ->idpost = $post->idpost;
        $favoris->save();
        
        return redirect('/');
    }
}
