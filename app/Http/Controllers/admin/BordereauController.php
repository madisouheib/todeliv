<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bordereau;


class BordereauController extends Controller
{

  public function index(){


        $DataCard = Bordereau::find('1');
        return view('dashboard.pages.bordereau.table_bord');
        

  }


}
