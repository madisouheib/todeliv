<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Stats;
use App\Colis;
use App\Fiche;
class StatsController extends Controller
{




    public function stats_tags(){

        $DataStats = Stats::all();
        
        return response()->json($DataStats);
        
        
        
        }

public function stats_tags_client(){

    $DataStats = Stats::where('order_stats','=',5)->get();
    return response()->json($DataStats);

}


        public function stats_nav(){

$GetEch = Stats::where('order_stats','=',5)->pluck('id_stats')->toArray();
$DataStat = array();

$DataStat['rec'] = Colis::leftJoin('commandes','commandes.id_coms','=','colis.id_com')->whereNull('colis.id_stats')->where('validation','=',false)->where('commandes.confirmed_user','=',true)->count();


$DataStat['inhouse']= Colis::where(function ($query) {
    $query->where('validation','=', 1)
        ->where('id_stats', '=', 11);
})->orWhere(function($query) {
    $query->where('validation', '=',1)
        ->where('id_stats', '=', null);	
})->count();



$DataStat['enliv'] = Colis::where('colis.id_stats','=',10)->count();
$DataStat['livre']  = Colis::where('colis.id_stats','=',4)->count();

$DataStat['countfiche']  = Fiche::where('fiche.cloture','=',false)->count();

$DataStat['ech']  = Colis::whereIn('colis.id_stats',$GetEch)->count();

$DataStat['retour']  = Colis::where('colis.id_stats','=',3)->count();



return response()->json($DataStat);



        }


  public function stats_nav_user($id){




    $GetEch = Stats::where('order_stats','=',5)->pluck('id_stats')->toArray();
    $DataStat = array();
    

    
    
    $DataStat['rec']= Colis::leftJoin('commandes','commandes.id_coms','=','colis.id_com')->where(function ($query) {
        $query->where('validation','=', 1)
            ->where('id_stats', '=', 11);
    })->orWhere(function($query) {
        $query->where('validation', '=',1)
            ->where('id_stats', '=', null);	
    })->where('commandes.id_clt','=',$id)->count();
    
    
    
    $DataStat['enliv'] = Colis::leftJoin('commandes','commandes.id_coms','=','colis.id_com')->where('colis.id_stats','=',10)->where('commandes.id_clt','=',$id)->count();
    $DataStat['livre']  = Colis::leftJoin('commandes','commandes.id_coms','=','colis.id_com')->where('colis.id_stats','=',4)->where('commandes.id_clt','=',$id)->count();
    

    
    $DataStat['ech']  = Colis::leftJoin('commandes','commandes.id_coms','=','colis.id_com')->whereIn('colis.id_stats',$GetEch)->where('commandes.id_clt','=',$id)->count();
    
    $DataStat['retour']  = Colis::leftJoin('commandes','commandes.id_coms','=','colis.id_com')->where('colis.id_stats','=',3)->where('commandes.id_clt','=',$id)->count();
    
    
    
    return response()->json($DataStat);











  }      
        
}
