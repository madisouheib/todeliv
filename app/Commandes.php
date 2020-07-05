<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commandes extends Model
{
    
    protected $table = 'commandes';


    protected $primaryKey = 'id_coms';

    public $timestamps = true;




    protected $fillable = [
        'id_clt','nom_com','confirmed','confirmed_user','cloture'
    ];
    public function colis(){

        return $this->hasMany(Colis::class,'id_com', 'id_coms');
    
    }


 


}
