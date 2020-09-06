<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{


    protected $primaryKey = 'id_stats';
    protected $table = 'stats';
    public $timestamps = false;
    protected $fillable = [
        'field_stats'
    ];





}
