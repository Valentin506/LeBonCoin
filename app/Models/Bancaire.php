<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bancaire extends Model
{
    use HasFactory;
    protected $table = "infobancaire";
    protected $primaryKey = "idinfobancaire";
    public $timestamps = false;
}
