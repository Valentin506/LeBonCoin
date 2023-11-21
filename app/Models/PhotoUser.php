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

}
