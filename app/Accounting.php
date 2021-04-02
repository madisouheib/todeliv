<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounting extends Model
{




    protected $table = 'accounting_fiche';


    protected $primaryKey = 'id_accounting';

    public $timestamps = true;

    protected $fillable = [
        'field_account','id_partner','etat'
    ];


public function  total(){



               
     //return $this->hasManyThrough('App\Question','App\Cours','id_module','id_cours', 'idmodule', 'id_cours');
    //  $this->hasManyThrough('App\Colis','App\FicheColis','id_fiche','id_colis', 'id_fiche', 'id_colis');
      return  $this->hasManyThrough('App\Colis' ,'App\AccountColis','id_account','id_colis','id_accounting','id_colis');
 
}
public function  retour(){



               
    //return $this->hasManyThrough('App\Question','App\Cours','id_module','id_cours', 'idmodule', 'id_cours');
   //  $this->hasManyThrough('App\Colis','App\FicheColis','id_fiche','id_colis', 'id_fiche', 'id_colis');
     return  $this->hasManyThrough('App\Colis' ,'App\AccountColis','id_account','id_colis','id_accounting','id_colis')->where('colis.id_stats','=',13);

}

public function  livre(){



               
    //return $this->hasManyThrough('App\Question','App\Cours','id_module','id_cours', 'idmodule', 'id_cours');
   //  $this->hasManyThrough('App\Colis','App\FicheColis','id_fiche','id_colis', 'id_fiche', 'id_colis');
     return  $this->hasManyThrough('App\Colis' ,'App\AccountColis','id_account','id_colis','id_accounting','id_colis')->where('colis.id_stats','=',12);

}

public function  totaldeliv(){



               
    //return $this->hasManyThrough('App\Question','App\Cours','id_module','id_cours', 'idmodule', 'id_cours');
   //  $this->hasManyThrough('App\Colis','App\FicheColis','id_fiche','id_colis', 'id_fiche', 'id_colis');
     return  $this->hasManyThrough('App\Colis' ,'App\AccountColis','id_account','id_colis','id_accounting','id_colis');

}


}
