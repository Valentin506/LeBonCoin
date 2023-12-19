<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bancaire extends Model
{
    use HasFactory;
    protected $table = "infobancaire";
    protected $primaryKey = "idinfobancaire";
    protected $fillable = ['numcarte','numcvv','dateexpiration'];
    public $timestamps = false;

    public function user(){
        return $this->hasOne(User::class, "idcompte", "idcompte");
    }
}


