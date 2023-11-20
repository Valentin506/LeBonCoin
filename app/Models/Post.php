<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "annonce";
    protected $primaryKey = "idannonce";
    protected $foreignKey1 = "idcapacite";
    protected $foreignKey2 = "idadresse";
    protected $foreignKey3 = "idhebergement";
    protected $foreignKey4 = "idimage";
    protected $foreignKey5 = "idproprietaire";
    public $timestamps = false;
}
