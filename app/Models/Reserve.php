<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    
    protected $table = "reserve";
    protected $primaryKey = "idannonce";
    public $timestamps = false;
    
}
