<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfiles extends Model
{

    protected $table = 'model_has_roles';
    public $timestamps = false;
    protected $fillable = [
        'role_id','model_id'
    ];

}
