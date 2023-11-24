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

    public function departement(){
        return $this->belongsTo(User::class, 'idville', 'idadresse');
    }

}
