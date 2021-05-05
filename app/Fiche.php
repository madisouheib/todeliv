<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fiche extends Model
{


    protected $primaryKey = 'id_fiche';
    protected $table = 'fiche';
    public $timestamps = true;
    protected $fillable = [
        'nom_fiche','id_liv','id_cord','closed_at','cloture','notice','valid_fiche','hub_id'
    ];

    public function fichecolis(){

        return $this->hasMany(FicheColis::class,'id_fiche', 'id_fiche');
 
    
    }

    public function price(){



               
     //return $this->hasManyThrough('App\Question','App\Cours','id_module','id_cours', 'idmodule', 'id_cours');
     return $this->hasManyThrough('App\Colis','App\FicheColis','id_fiche','id_colis', 'id_fiche', 'id_colis');
    }


}
