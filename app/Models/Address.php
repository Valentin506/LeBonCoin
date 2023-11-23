<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $table = "adresse";
    protected $primaryKey = "idadresse";
    public $timestamps = false;


    public function user(){
        return $this->belongsTo(User::class, 'idadresse', 'idcompte');
    }
}
