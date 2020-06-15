<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hub extends Model
{

    protected $primaryKey = 'id_hub';
    protected $table = 'hubs';
    public $timestamps = false;
    protected $fillable = [
        'nom_hub','adresse'
    ];

public function wilayas(){

    return $this->hasMany(HubWilaya::class,'id_hub', 'id_hub');

}
public function users(){

    return $this->hasMany(Users::class,'hub_id', 'id_hub');
    
    }
    


}
