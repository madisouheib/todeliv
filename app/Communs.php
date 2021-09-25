<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Communs extends Model
{

        protected $primaryKey = 'id';
        protected $table = 'communes';
        public $timestamps = false;
        protected $fillable = [
            'code_postal','nom','wilaya_id',
        ];
    
     
            
    
    

    
}
