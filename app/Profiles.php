<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{

    protected $table = 'roles';

    protected $fillable = [
        'id','name'
    ];



}
