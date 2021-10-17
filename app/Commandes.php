<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Colis;
use Illuminate\Support\Facades\DB;
class Commandes extends Model
{
    
    protected $table = 'commandes';


    protected $primaryKey = 'id_coms';

    public $timestamps = true;




    protected $fillable = [
        'id_clt','nom_com','confirmed','confirmed_user','cloture','id_hub','stopdesk'
    ];
    public function colis(){

        return $this->hasMany(Colis::class,'id_com', 'id_coms');
 
    
    }

    public function price(){

        return $this->hasMany(Colis::class,'id_com', 'id_coms')->select(DB::raw('SUM(price) as sum_price'));
    
    }




    public function signaler(){
        return $this->hasMany(Colis::class,'id_com', 'id_coms')->where('colis.signaler','=',true );
    
    
  
  // return $this->hasMany('App\Colis')->selectRaw('colis.id_com,SUM(colis.price) as total') ->groupBy('colis.id_com');

    }
    public function validate(){

        return $this->hasMany(Colis::class,'id_com', 'id_coms')->where('colis.validation','=',true );
  // return $this->hasMany('App\Colis')->selectRaw('colis.id_com,SUM(colis.price) as total') ->groupBy('colis.id_com');

    }

    public function sum(){

        return $this->hasMany(Colis::class,'id_com', 'id_coms')->selectRaw('colis.id_com,SUM(colis.price) as total') ->groupBy('colis.id_com');
       


    }

    public function nodelivred(){

        return $this->hasMany(Colis::class,'id_com', 'id_coms');
 
    
    }


 


}
