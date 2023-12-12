<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $table = "ville";
    protected $primaryKey = "idville";
    public $timestamps = false;

    public function departement(): HasOne
    {
        return $this->hasOne(Departement::class, "iddepartement","idville");
    }

    public function adresseAnnonce(): HasOne
    {
        return $this->hasOne(Adresse::class, "idville" ,"idadresse" );
    }

}
