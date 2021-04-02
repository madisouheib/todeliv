<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountColis extends Model
{
    


    protected $table = 'account_colis';




    public $timestamps = false;

    protected $fillable = [
        'id_colis','id_account'
    ];


}
