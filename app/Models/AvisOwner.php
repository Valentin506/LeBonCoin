<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvisOwner extends Model
{
    use HasFactory;
    protected $table = "avis";
    protected $primaryKey = "idavis";
    public $timestamps = false;
    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'idproprietaire','idavis');
    }
    

}
