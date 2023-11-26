<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Owner extends Model
{
    use HasFactory;
    protected $table = "proprietaire";
    protected $primaryKey = "idproprietaire";
    public $timestamps = false;

    public function post(): HasMany{
        return $this->hasMany(Post::class, 'idproprietaire');
    }

    public function avisOwner(): HasMany{
        return $this->hasMany(AvisOwner::class, 'idavis', 'idproprietaire');
    }

    public function user(): belongsTo{
        return $this->belongsTo(User::class, 'idproprietaire','idcompte');
    }




}
