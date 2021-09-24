<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Colis ;
use App\StatsColis ;
use App\Commandes ;
class ClientController extends Controller
{


public function data_recp_client(){



    return view('dashboard.pages.customers.reception_client');


}



public function data_user_recp($id){


    $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
    ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->where('validation','=',true)
  
    ->where(function ($query) {
        $query->where('id_stats','=',null)
        ->orWhere('id_stats','=',11);
    })
    ->where('commandes.id_clt','=',$id)->orderBy('id_colis', 'desc')->paginate(8);

    return response()->json($Colis);

}

public function data_enlivraison_client(){

    return view('dashboard.pages.customers.enlivraison_client');



    
}
public function data_user_enliv($id){


    $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->leftJoin('users', 'users.id', '=', 'commandes.id_clt')->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')->where('validation','=',true)->where('colis.id_stats','=',10)->where('id_clt','=',$id)->orderBy('id_colis', 'desc')->paginate(8);

    return response()->json($Colis);


}

public function data_livre_client(){



    return view('dashboard.pages.customers.livre_client');


    
}

public function data_user_livre($id){


    $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->leftJoin('users', 'users.id', '=', 'commandes.id_clt')->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')->where('validation','=',true)->where('colis.id_stats','=',4)->where('id_clt','=',$id)->orderBy('id_colis', 'desc')->paginate(8);

    return response()->json($Colis);

}



public function data_retour_client(){




    return view('dashboard.pages.customers.retour_client');
    
}

public function data_user_retour($id){

    $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->leftJoin('users', 'users.id', '=', 'commandes.id_clt')->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')->where('validation','=',true)->where('colis.id_stats','=',3)->where('id_clt','=',$id)->orderBy('id_colis', 'desc')->paginate(8);

    return response()->json($Colis);

}


public function data_echoue_client(){




    return view('dashboard.pages.customers.echoue_client');
    
}


public function data_user_echoue($id){

    $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub','stats.field_stats','stats_colis.message','stats_colis.id_stats_colis')
    
    
    ->leftJoin('stats_colis', function($query) 
{
   $query->on('colis.id_colis','=','stats_colis.id_colis')
   ->whereRaw('stats_colis.id_stats_colis IN (select MAX(a2.id_stats_colis) from stats_colis as a2 join colis as u2 on u2.id_colis = a2.id_colis group by a2.id_colis)');
})
    ->leftJoin('stats', 'stats.id_stats', '=', 'colis.id_stats')->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->leftJoin('users', 'users.id', '=', 'commandes.id_clt')->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')->where('validation','=',true)->where('id_clt','=',$id)->where('stats.order_stats','=',5)->orderBy('id_colis', 'desc')->paginate(8);

    return response()->json($Colis);

}
public function stats_edit(Request $request){

    $idstats   =  $request->input('idstats');
    $field   =  $request->input('field');
//dd($field);
    $StatsUpdate = StatsColis::find($idstats);


    $StatsUpdate->message = $field;

$StatsUpdate->save();


}



}
