<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = "compte";
    public $timestamps = false;
    protected $primaryKey = "idcompte";
    
    public function getAuthPassword() {
        return $this->motdepasse;
    }

    public function owner(){
        return $this->HasOne(Owner::class, "idcompte", "idproprietaire");
    }

    public function photoUser(){
        return $this->hasOne(PhotoUser::class, "idphotoprofil", "idphotoprofil");
    }

    public function adresse(){
        return $this->hasOne(Adresse::class, "idadresse", "idadresse");
    }
    public function favoris()
    {
        return $this->hasMany(Favorite::class, 'idcompte');
    }
    public function bookings()
    {
        return $this->hasMany(Reservation::class, 'idcompte');
    }
    public function estDansLesFavoris($idannonce)
    {
        return $this->favoris()->where('met_en_favoris.idannonce', $idannonce)->exists();
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

}



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'password' => 'hashed',
    // ];
// }
