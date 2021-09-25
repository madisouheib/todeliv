<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colis extends Model
{
    
    protected $table = 'colis';


    protected $primaryKey = 'id_colis';

    public $timestamps = true;

    protected $fillable = [
        'nom_client','wilaya','remarque','id_com','tel','adress','commune','qte','produit','price','shipping_price','tmp_validation','validation','comun_id','wilaya_id','signaler','tmp_signaler','id_stats','id_hub'
    ];
    public function stats(){

        return $this->hasMany(StatsColis::class,'id_colis', 'id_colis')->where('id_stats','=',10);
    
    
    }


}
