<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapaciteLogement extends Model
{
    use HasFactory;
    protected $table = "capacitelogement";
    protected $primaryKey = "idcapacite";
    public $timestamps = false;

}
