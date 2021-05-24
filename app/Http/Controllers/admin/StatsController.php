<?php

namespace App\Http\Controllers\admin;

use App\Accounting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Stats;
use App\Colis;
use App\Fiche;
use App\Transit;
use App\User;


class StatsController extends Controller
{


    public function CheckLogin($id)

    {
    
        $CheckLogin = User::select('roles.name as guard','users.hub_id as hub')
        ->leftJoin('model_has_roles','model_has_roles.model_id','=','users.id')
        ->leftJoin('roles','roles.id','=','model_has_roles.role_id')->where('users.id','=',$id)->first();
        
        //dd($CheckLogin['guard']);
        return $CheckLogin;
        
    
    
    }

    public function stats_tags(){

        $DataStats = Stats::all();
        
        return response()->json($DataStats);
        
        
        
        }

public function stats_tags_client(){

    $DataStats = Stats::where('order_stats','=',5)->get();
    return response()->json($DataStats);

}


        public function stats_nav($id){

$GetEch = Stats::where('order_stats','=',5)->pluck('id_stats')->toArray();
$DataStat = array();


$Data = $this->CheckLogin($id);

if($Data['guard'] == 'admin'){

    $DataStat['nonrec'] = Colis::leftJoin('commandes','commandes.id_coms','=','colis.id_com')->whereNull('colis.id_stats')->where('validation','=',false)->where('commandes.confirmed_user','=',false)->count();
    $DataStat['rec'] = Colis::leftJoin('commandes','commandes.id_coms','=','colis.id_com')->whereNull('colis.id_stats')->where('validation','=',false)->where('commandes.confirmed_user','=',true)->count();


    $DataStat['inhouse']= Colis::where(function ($query) {
        $query->where('validation','=', 1)
            ->where('id_stats', '=', 11);
    })->orWhere(function($query) {
        $query->where('validation', '=',1)
            ->where('id_stats', '=', null);	
    })->count();
    
    
    
    $DataStat['enliv'] = Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
    ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->where('validation','=',true)
    ->where('fiche.valid_fiche','=',true)
    ->whereNull('fiche.closed_at')
    ->where('fiche.cloture','=',0)
    ->where('colis.id_stats','=',10)->count();
    
    $DataStat['livre']  = Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
    ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->where('validation','=',true)
    ->distinct('colis.id_colis')
    ->whereNotNull('fiche.closed_at')
    ->whereNotNull('fiche.cloture')->where('colis.id_stats','=',4)->count();
    
    $DataStat['countfiche']  = Fiche::where('fiche.cloture','=',0)->count();
    
    $DataStat['ech']  = Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
    ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->where('validation','=',true)
->whereIn('colis.id_stats',$GetEch)->distinct('colis.id_colis')->count();
    
    $DataStat['retour']  = Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
    ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->where('validation','=',true)
    ->whereNotNull('fiche.closed_at')
    ->whereNotNull('fiche.cloture')->where('colis.id_stats','=',3)->count();
    
    $DataStat['trenv'] = Transit::where('transit.send_it','=',true)->where('confirmed','=',false)->count();
    $DataStat['trecp'] = Transit::where('transit.send_it','=',true)->where('confirmed','=',true)->count();
    

    $DataStat['compta']  = Colis::whereNull('colis.shipping_price')
    ->where(function ($query) {
        $query->where('colis.id_stats', '=', 13)
              ->orWhere('colis.id_stats', '=', 12);
    })->count();

    $DataStat['facture'] = Accounting::where('etat','=',0)->count();

    //$DataStat['trrecp'] = Transit::where('transit.confirmed','=',true)->count();
    

    


}else {


    $DataStat['rec'] = Colis::leftJoin('commandes','commandes.id_coms','=','colis.id_com')->whereNull('colis.id_stats')->where('validation','=',false)->where('commandes.confirmed_user','=',true)->count();


    $DataStat['inhouse']= Colis::where(function ($query) {
        $query->where('validation','=', 1)
            ->where('id_stats', '=', 11);
    })->orWhere(function($query) {
        $query->where('validation', '=',1)
            ->where('id_stats', '=', null);	
    })
    ->where('colis.id_hub','=',$Data['hub'])
    ->count();
    
    
    
    $DataStat['enliv'] = Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
    ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->where('validation','=',true)
    ->where('fiche.valid_fiche','=',true)
    ->whereNull('fiche.closed_at')
    ->where('fiche.cloture','=',0)
    ->where('colis.id_hub','=',$Data['hub'])
    ->where('colis.id_stats','=',10)->count();
    
    $DataStat['livre']  = Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
    ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->where('validation','=',true)
    ->whereNotNull('fiche.closed_at')
    ->where('colis.id_hub','=',$Data['hub'])
    ->whereNotNull('fiche.cloture')->where('colis.id_stats','=',4)->count();
    
    $DataStat['countfiche']  = Fiche::where('fiche.cloture','=',0)->count();
    
    $DataStat['ech']  = Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
    ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->where('validation','=',true)
    ->whereNotNull('fiche.closed_at')
    ->where('colis.id_hub','=',$Data['hub'])
    ->whereNotNull('fiche.cloture')->whereIn('colis.id_stats',$GetEch)->count();
    
    $DataStat['retour']  = Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
    ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->where('validation','=',true)
    ->whereNotNull('fiche.closed_at')
    ->where('colis.id_hub','=',$Data['hub'])
    ->whereNotNull('fiche.cloture')->where('colis.id_stats','=',3)->count();
    
    $DataStat['trenv'] = Transit::where('transit.send_it','=',true)
    ->where('transit.id_hub','=',$Data['hub'])
    ->where('confirmed','=',false)->count();
    $DataStat['trecp'] = Transit::where('transit.send_it','=',true)
    ->where('transit.receive_hub','=',$Data['hub'])
    ->where('confirmed','=',true)->count();
    
    //$DataStat['trrecp'] = Transit::where('transit.confirmed','=',true)->count();
    



}


return response()->json($DataStat);

        }


  public function stats_nav_user($id){




    $GetEch = Stats::where('order_stats','=',5)->pluck('id_stats')->toArray();
    $DataStat = array();
    

    
    
    $DataStat['rec']= Colis::leftJoin('commandes','commandes.id_coms','=','colis.id_com')->where(function ($query) {
        $query->where('id_stats','=',null)
        ->orWhere('id_stats','=',11);
    })
    ->where('commandes.id_clt','=',$id)->count();
    
    
    
    $DataStat['enliv'] = Colis::leftJoin('commandes','commandes.id_coms','=','colis.id_com')->where('colis.id_stats','=',10)->where('commandes.id_clt','=',$id)->count();
    $DataStat['livre']  = Colis::leftJoin('commandes','commandes.id_coms','=','colis.id_com')->where('colis.id_stats','=',4)->where('commandes.id_clt','=',$id)->count();
    

    
    $DataStat['ech']  = Colis::leftJoin('commandes','commandes.id_coms','=','colis.id_com')->whereIn('colis.id_stats',$GetEch)->where('commandes.id_clt','=',$id)->count();
    
    $DataStat['retour']  = Colis::leftJoin('commandes','commandes.id_coms','=','colis.id_com')->where('colis.id_stats','=',3)->where('commandes.id_clt','=',$id)->count();
    
    
    
    return response()->json($DataStat);











  }      
        
}
