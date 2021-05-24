<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use Notifiable,HasRoles,HasApiTokens;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','adresse','hub_id','full_name','phone','wilaya','service_client'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
  




    public function colis(){



               
     //return $this->hasManyThrough('App\Question','App\Cours','id_module','id_cours', 'idmodule', 'id_cours');
     return $this->hasManyThrough('App\Fiche','App\FicheColis','id_fiche','id_liv', 'id', 'id_fiche');
    }


    public function deliv(){



               
        //return $this->hasManyThrough('App\Question','App\Cours','id_module','id_cours', 'idmodule', 'id_cours');
        return $this->hasManyThrough('App\FicheColis','App\Fiche','id_liv','id_fiche', 'id', 'id_fiche')->whereNull('fiche.closed_at')->where('fiche.valid_fiche','=',true)->where('cloture','=',false);
       }

    public function amount(){


        return $this->hasManyDeep(  'App\Colis',
        ['App\Fiche', 'App\FicheColis'], // Intermediate models, beginning at the far parent (Country).
        [
           'id_liv', // Foreign key on the "FicheColis" table.
           'id_fiche',    // Foreign key on the "Colis" table.
           'id_colis'     // Foreign key on the "Fiche" table.
        ],
        [
          'id', // Local key on the "User" table.
          'id_fiche', // Local key on the "FicheColis" table.
          'id_colis'  // Local key on the "Colis" table.
        ])->where('fiche.cloture','=',false)->where('colis.id_stats','=',4);
        
    }


    public function totalchnge(){


        return $this->hasManyDeep(  'App\Colis',
        ['App\Fiche', 'App\FicheColis'], // Intermediate models, beginning at the far parent (Country).
        [
           'id_liv', // Foreign key on the "FicheColis" table.
           'id_fiche',    // Foreign key on the "Colis" table.
           'id_colis'     // Foreign key on the "Fiche" table.
        ],
        [
          'id', // Local key on the "User" table.
          'id_fiche', // Local key on the "FicheColis" table.
          'id_colis'  // Local key on the "Colis" table.
        ])->where('fiche.cloture','=',false)->where('fiche.valid_fiche','=',true)->where('colis.id_stats','!=',10);
        
    }

    public function totalexist(){


        return $this->hasManyDeep(  'App\Colis',
        ['App\Fiche', 'App\FicheColis'], // Intermediate models, beginning at the far parent (Country).
        [
           'id_liv', // Foreign key on the "FicheColis" table.
           'id_fiche',    // Foreign key on the "Colis" table.
           'id_colis'     // Foreign key on the "Fiche" table.
        ],
        [
          'id', // Local key on the "User" table.
          'id_fiche', // Local key on the "FicheColis" table.
          'id_colis'  // Local key on the "Colis" table.
        ])->where('fiche.valid_fiche','=',true)->where('fiche.cloture','=',false);
        
    }


    public function montant(){


        return $this->hasManyDeep(  'App\Colis',
        ['App\Fiche', 'App\FicheColis'], // Intermediate models, beginning at the far parent (Country).
        [
           'id_liv', // Foreign key on the "FicheColis" table.
           'id_fiche',    // Foreign key on the "Colis" table.
           'id_colis'     // Foreign key on the "Fiche" table.
        ],
        [
          'id', // Local key on the "User" table.
          'id_fiche', // Local key on the "FicheColis" table.
          'id_colis'  // Local key on the "Colis" table.
        ])->where('fiche.cloture','=',false);
        
    }

public function fiche(){

    return $this->hasMany(Fiche::class,'id_liv', 'id');


}

}
