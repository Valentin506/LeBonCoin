<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceAccessibilite extends Model
{
    use HasFactory;
    protected $table = "serviceaccessibilite";
    protected $primaryKey = "idservice";
    public $timestamps = false;

}