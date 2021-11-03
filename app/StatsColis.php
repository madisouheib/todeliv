<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatsColis extends Model
{


    protected $primaryKey = 'id_stats_colis';
    protected $table = 'stats_colis';
    public $timestamps = true;
    protected $fillable = [
        'id_stats','by_id_user','id_colis','message'
    ];




}
