<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    protected $primaryKey = 'id_wilaya';
    protected $table = 'wilaya';
    public $timestamps = false;
    protected $fillable = [
        'nom_wilaya','mat_wilaya','price_deliv','nom_wilaya_ar'
    ];

    public function wilayas(){

        return $this->belongsToMany(Wilaya::class);
        
        }
        



}
