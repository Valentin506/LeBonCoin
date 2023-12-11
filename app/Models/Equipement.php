<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    use HasFactory;
    protected $table = "equipement";
    protected $primaryKey = "idequipement";
    public $timestamps = false;


    public function post(): HasMany{
        return $this->hasMany(Post::class, 'idequipement', 'idannonce');
    }

}