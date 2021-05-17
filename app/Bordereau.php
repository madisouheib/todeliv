<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bordereau extends Model
{
    //

      
    protected $table = 'bordereau';


    protected $primaryKey = 'id';

    public $timestamps = false;


    protected $fillable = [
        'brand','logo','color','phone','notes'
    ];

}
