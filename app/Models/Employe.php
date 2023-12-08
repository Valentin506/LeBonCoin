<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Employe extends Authenticatable
{
    use  HasFactory, Notifiable;
    protected $table = "employe";
    public $timestamps = false;
    protected $primaryKey = "idemploye";


    public function service(){
        return $this->HasOne(Service::class, "idservice", "idservice");
    }

    public function getAuthPassword() {
        return $this->motdepasse;
    }
    
}
