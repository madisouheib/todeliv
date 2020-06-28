<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colis extends Model
{
    
    protected $table = 'colis';


    protected $primaryKey = 'id_colis';

    public $timestamps = true;

    protected $fillable = [
        'nom_client','wilaya','remarque','id_com','tel','adress','commune','qte','produit','price'
    ];



}
