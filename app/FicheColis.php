<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FicheColis extends Model
{



    protected $primaryKey = 'id_delivery';
    protected $table = 'fiche_fields';
    public $timestamps = true;
    protected $fillable = [
        'id_user','id_colis','id_fiche'
    ];



}
