<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;
    protected $table = "annonce";
    protected $primaryKey = "idannonce";
    protected $fillable = [ 'titreannonce','paiementenligne', 'description','datepublication'

    ];
    public $timestamps = false;

    public function photoPost(): HasMany{
        return $this->hasMany(PhotoUser::class, 'idimage');
    }

    public function owner(): HasOne{
        return $this->hasOne(Owner::class, 'idproprietaire');
    }

    
    
    
}
