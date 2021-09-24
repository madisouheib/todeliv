<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HubWilaya extends Model
{
    protected $table = 'hub_wilaya';
    public $timestamps = false;
    protected $primaryKey = 'id_hubwil';
    protected $fillable = [
        'id_wilaya','id_hub','stopdesk','price_home','comission'
    ];



    
}
