<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeHebergement extends Model
{
    use HasFactory;
    protected $table = "typehebergement";
    protected $primaryKey = "idhebergement";
    public $timestamps = false;

    public function post(): HasMany{
        return $this->hasMany(Post::class, 'idhebergement', 'idannonce');
    }


}
