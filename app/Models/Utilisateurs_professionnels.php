<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateurs_professionnels extends Model
{
    use HasFactory;
    protected $table = 'utilisateurs_professionnels';
    protected $fillable = ['email', 'telephone', 'password', 'nom', 'siret', 'societe', 'adresse', 'ville', 'secteur'];
}
