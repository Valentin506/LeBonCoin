<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Owner extends Model
{
    use HasFactory;
    protected $table = "proprietaire";
    protected $primaryKey = "idproprietaire";
    public $timestamps = false;

    public function post(): BelongsTo{
        return $this->belongsTo(Post::class, 'idproprietaire', 'idannonce');
    }
}
