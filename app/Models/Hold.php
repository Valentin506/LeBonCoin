<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hold extends Model
{
    use HasFactory;
    protected $table = "detient";
    protected $primaryKey = "idannonce";
    public $timestamps = false;

    public function posts() {
        return $this->belongsToMany(
            Post::class,
            'annonce',
            'idannonce',
            'idservice'
        );
    }
}
