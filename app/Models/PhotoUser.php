<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoUser extends Model
{
    use HasFactory;
    protected $table = "photo";
    protected $primaryKey = "idimage";
    
    public $timestamps = false;

    public function getImage(){
        $posts = Post::select('photo.image')
        	->join('annonce', 'annonce.idimage', '=', 'photo.idimage')
        	->get();
    }

}
