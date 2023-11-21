<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    protected $table = "annonce";
    protected $primaryKey = "idannonce";
    protected $fillable = [ 'titreannonce','paiementenligne', 'description','datepublication'

    ];
    public $timestamps = false;

    
    
    
}
