<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use Notifiable,HasRoles;
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


    public function colis(){



               
     //return $this->hasManyThrough('App\Question','App\Cours','id_module','id_cours', 'idmodule', 'id_cours');
     return $this->hasManyThrough('App\Fiche','App\FicheColis','id_fiche','id_liv', 'id', 'id_fiche');
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
        ]);
        
    }

public function fiche(){

    return $this->hasMany(Fiche::class,'id_liv', 'id');


}

}
