<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoUser extends Model
{
    use HasFactory;
    protected $table = "photoprofil";
    protected $primaryKey = "idphotoprofil";
    
    public $timestamps = false;

    public function post(): BelongsTo{
        return $this->belongsTo(User::class, 'idphotoprofil', 'idcompte');
    }

}
