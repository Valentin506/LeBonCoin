<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateurs_particuliers extends Model
{
    use HasFactory;
    protected $table = 'utilisateurs_particuliers';
    protected $fillable = ['email', 'telephone', 'password', 'nom'];
    
}
