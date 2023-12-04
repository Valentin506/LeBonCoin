<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table = "met_en_favoris";
    public $timestamps = false;
    protected $primaryKey = "idannonce";
    
}
