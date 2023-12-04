<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class Post extends Model
{
    use HasFactory;
    protected $table = "annonce";
    protected $primaryKey = "idannonce";
    protected $fillable = [ 'titreannonce','paiementenligne', 'description','datepublication'

    ];
    public $timestamps = false;

    public function photoPost(): HasMany{
        return $this->hasMany(PhotoPost::class, 'idimage');
    }

    public function owner(): HasOne{
        return $this->hasOne(Owner::class, 'idproprietaire', 'idproprietaire');
    }
    public function typeHebergement(): HasOne{
        return $this->hasOne(TypeHebergement::class, 'idhebergement','idhebergement');
    }
    public function capaciteLogement(): HasOne{
        return $this->hasOne(CapaciteLogement::class, 'idcapacite', 'idcapacite');
    }
    public function adresseAnnonce(): HasOne{
        return $this->hasOne(Adresse::class, 'idadresse', 'idadresse');
    }

    public function ville(){
        return $this->belongsTo(Ville::class);
    }

    public function equipements(){
        return $this->belongsToMany(
            Equipement::class,
            'possede',
            'idannonce',
            'idequipement'
        );
    }

    


    
    
    
}
