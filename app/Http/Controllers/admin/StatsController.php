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




        public function stats_nav(){

$GetEch = Stats::where('order_stats','=',5)->pluck('id_stats')->toArray();
$DataStat = array();

$DataStat['rec'] = Colis::whereNull('colis.id_stats')->count();


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
        
}
