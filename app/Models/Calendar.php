<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    protected $table = "calendrier";
    protected $primaryKey = "idcalendrier";
    public $timestamps = false;
    protected $fillable = [
        'idannonce',
        'periodedebut',
        'periodefin',
        'disponibilite',
        'prixpardate',
        
    ];

    public function posts(): HasOne{
        return $this->hasOne(Post::class, 'idannonce', 'idcalendrier');
    }

    // public function posts(): BelongsTo{
    //     return $this->belongsTo(Post::class, 'idcalendrier', 'idannonce');
    // }

}
