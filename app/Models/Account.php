<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;





class Account extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "locataire";
    protected $primaryKey = "IDLocataire";
    public $timestamps = false;
}
