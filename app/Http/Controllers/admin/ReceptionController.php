<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Commandes;
class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.recep.rec_table');
    }
  
//section receptions add new fields +++++++++++++

    public function add_recp($idcom)
    {

 $DataManif = Commandes::find($idcom);



        return view('dashboard.pages.recep.rec_validate')->with('datamanif',$DataManif);
    }





// END section receptions add new fields +++++++++++++
    public function archive_recp(){


        return view('dashboard.pages.recep.rec_archive');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

  
   
}
