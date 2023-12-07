<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Possess extends Model
{
    use HasFactory;
    protected $table = "possede";
    protected $primaryKey = "idannonce";
    public $timestamps = false;

    public function posts() {
        return $this->belongsToMany(
            Post::class,
            'annonce',
            'idannonce',
            'idequipement'
        );
    }
}
