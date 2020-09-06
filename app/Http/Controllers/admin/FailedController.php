<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Colis;
class FailedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.faild.faild_table');
    }

 

public function data_failed_colis(){

    $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
    ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->leftJoin('stats', 'stats.id_stats', '=', 'colis.id_stats')
    ->where('validation','=',true)
    ->where('stats.order_stats','=',5)
    ->orderBy('id_colis', 'desc')->paginate(8);

    return response()->json($Colis);

    
}


}
