<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Account as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;





class Account extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "compte";
    protected $primaryKey = "idcompte";
    public $timestamps = false;
}
