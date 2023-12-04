<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Favorite;

class FavorisController extends Controller
{
    public function fav()
    {
        return view('/');
    }
    
    public function save(Request $request)
    {
        return redirect('/');
    }
}
