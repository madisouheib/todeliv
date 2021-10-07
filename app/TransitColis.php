<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransitColis extends Model
{


    protected $primaryKey = 'id_trans';
    protected $table = 'transitcolis';
    public $timestamps = false;
    protected $fillable = [
        'id_colis','id_transit'
    ];
    public function stats(){

        return $this->hasMany(Colis::class,'id_colis', 'id_colis')->where('id_stats','=',15);
    
    
    }


}
