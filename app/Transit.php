<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Transit extends Model
{


    protected $primaryKey = 'id_transit';
    protected $table = 'transit';

    protected $fillable = [
        'confirmed','field_transit','id_cordre','id_cordem','id_hub','receive_hub','send_it'
    ];

public function colis(){

    return $this->hasMany(TransitColis::class,'id_transit', 'id_transit');

}
public function colisapprvd(){

    return $this->hasMany(TransitColis::class,'id_transit', 'id_transit')->where('approved','=',true);

}

public function price(){



               
    //return $this->hasManyThrough('App\Question','App\Cours','id_module','id_cours', 'idmodule', 'id_cours');
    return $this->hasManyThrough('App\Colis','App\TransitColis','id_colis','id_colis', 'id_transit', 'id_transit');
   }



}
