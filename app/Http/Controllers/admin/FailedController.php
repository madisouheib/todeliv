<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Colis;
class FailedController extends Controller
{


    public function CheckLogin($id)

    {
    
        $CheckLogin = User::select('roles.name as guard','users.hub_id as hub')
        ->leftJoin('model_has_roles','model_has_roles.model_id','=','users.id')
        ->leftJoin('roles','roles.id','=','model_has_roles.role_id')->where('users.id','=',$id)->first();
        
        //dd($CheckLogin['guard']);
        return $CheckLogin;
        
    
    
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.faild.faild_table');
    }

 

public function data_failed_colis($id){


$Data = $this->CheckLogin($id);

if($Data['guard'] == 'admin'){
 $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub','stats_colis.message')
    ->leftJoin('stats_colis', function($query) {
        $query->on('colis.id_colis','=','stats_colis.id_colis')
            ->whereRaw('stats_colis.id_colis IN (select MAX(a2.id_stats_colis) from stats_colis as a2 join colis as u2 on u2.id_colis = a2.id_colis group by a2.id_colis)');
})
    ->leftJoin('commandes', 'colis.id_com','=','commandes.id_coms')

    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->join('stats', 'stats.id_stats', '=', 'colis.id_stats')
    ->where('validation','=',true)
   
    ->where('stats.order_stats','=',5)->distinct('colis.id_colis')
    ->orderBy('colis.id_colis', 'desc')->paginate('80');



   
    //dd($Colis);

    //$Colis = $Colis->unique('id_colis');
    return response()->json($Colis);



}else {

    $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub','stats_colis.message')
    ->leftJoin('stats_colis', function($query) {
        $query->on('colis.id_colis','=','stats_colis.id_colis')
            ->whereRaw('stats_colis.id_colis IN (select MAX(a2.id_stats_colis) from stats_colis as a2 join colis as u2 on u2.id_colis = a2.id_colis group by a2.id_colis)');
})
    ->leftJoin('commandes', 'colis.id_com','=','commandes.id_coms')

    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->leftJoin('stats', 'stats.id_stats', '=', 'colis.id_stats')
    ->where('validation','=',true)
    ->where('colis.id_hub','=',$Data['hub'])

    ->where('stats.order_stats','=',5)->distinct('colis.id_colis')
    ->orderBy('colis.id_colis', 'desc')->paginate('80');
    //dd($Colis);

    //$Colis = $Colis->unique('id_colis');
    return response()->json($Colis);



}
   

    
}

public function data_failed_filtre_colis($id,$client){


$Data = $this->CheckLogin($id);



if($Data['guard'] == 'admin'){


    $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub','stats_colis.message')
    ->leftJoin('stats_colis', function($query) {
        $query->on('colis.id_colis','=','stats_colis.id_colis')
            ->whereRaw('stats_colis.id_colis IN (select MAX(a2.id_colis) from stats_colis as a2 join colis as u2 on u2.id_colis = a2.id_colis group by u2.id_colis)');
})
    ->leftJoin('commandes', 'colis.id_com','=','commandes.id_coms')
  
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->leftJoin('stats', 'stats.id_stats', '=', 'colis.id_stats')
    ->where('validation','=',true)
    ->where('commandes.id_clt','=',$client)
    
    ->where('stats.order_stats','=',5)->distinct('colis.id_colis')
    ->orderBy('colis.id_colis', 'desc')->paginate(80);
    //dd($Colis);

    //$Colis = $Colis->unique('id_colis');
    return response()->json($Colis);


}else {



    $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub','stats_colis.message')
    ->leftJoin('stats_colis', function($query) {
        $query->on('colis.id_colis','=','stats_colis.id_colis')
            ->whereRaw('stats_colis.id_colis IN (select MAX(a2.id_colis) from stats_colis as a2 join colis as u2 on u2.id_colis = a2.id_colis group by u2.id_colis)');
})
    ->leftJoin('commandes', 'colis.id_com','=','commandes.id_coms')
  
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->leftJoin('stats', 'stats.id_stats', '=', 'colis.id_stats')
    ->where('validation','=',true)
    ->where('commandes.id_clt','=',$client)
    ->where('colis.id_hub','=',$Data['hub'])

    ->where('stats.order_stats','=',5)->distinct('colis.id_colis')
    ->orderBy('colis.id_colis', 'desc')->paginate(80);
    //dd($Colis);

    //$Colis = $Colis->unique('id_colis');
    return response()->json($Colis);


}



}


public function data_failed_colis_code($user,$id){

$Data = $this->CheckLogin($user);


if($Data['guard']== 'admin'){

    $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub','stats_colis.message')
    ->leftJoin('stats_colis', function($query) {
        $query->on('colis.id_colis','=','stats_colis.id_colis')
            ->whereRaw('stats_colis.id_colis IN (select MAX(a2.id_colis) from stats_colis as a2 join colis as u2 on u2.id_colis = a2.id_colis group by u2.id_colis)');
})
    ->leftJoin('commandes', 'colis.id_com','=','commandes.id_coms')

    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->leftJoin('stats', 'stats.id_stats', '=', 'colis.id_stats')
    ->where('validation','=',true)
    ->where('colis.id_colis','=',$id)

    ->where('stats.order_stats','=',5)->distinct('colis.id_colis')
    ->orderBy('colis.id_colis', 'desc')->paginate(80);
    //dd($Colis);

    //$Colis = $Colis->unique('id_colis');
    return response()->json($Colis);



}else {



    $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub','stats_colis.message')
    ->leftJoin('stats_colis', function($query) {
        $query->on('colis.id_colis','=','stats_colis.id_colis')
            ->whereRaw('stats_colis.id_colis IN (select MAX(a2.id_colis) from stats_colis as a2 join colis as u2 on u2.id_colis = a2.id_colis group by u2.id_colis)');
})
    ->leftJoin('commandes', 'colis.id_com','=','commandes.id_coms')

    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->leftJoin('stats', 'stats.id_stats', '=', 'colis.id_stats')
    ->where('validation','=',true)
    ->where('colis.id_colis','=',$id)
    ->where('colis.id_hub','=',$Data['hub'])

    ->where('stats.order_stats','=',5)->distinct('colis.id_colis')
    ->orderBy('colis.id_colis', 'desc')->paginate(80);
    //dd($Colis);

    //$Colis = $Colis->unique('id_colis');
    return response()->json($Colis);


}




}

public function data_failed_colis_wilaya($id,$wil){


$Data = $this->CheckLogin($id);


if($Data['guard'] == 'admin'){

    $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub','stats_colis.message')
    ->leftJoin('stats_colis', function($query) {
        $query->on('colis.id_colis','=','stats_colis.id_colis')
            ->whereRaw('stats_colis.id_colis IN (select MAX(a2.id_colis) from stats_colis as a2 join colis as u2 on u2.id_colis = a2.id_colis group by u2.id_colis)');
})
    ->leftJoin('commandes', 'colis.id_com','=','commandes.id_coms')
    ->join('fiche_fields', 'fiche_fields.id_colis', '=','colis.id_colis')
    ->join('fiche', 'fiche.id_fiche', '=','fiche_fields.id_fiche')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->leftJoin('stats', 'stats.id_stats', '=', 'colis.id_stats')
    ->where('validation','=',true)
    ->where('colis.wilaya','like','%'.$wil.'%')
    ->whereNotNull('fiche.closed_at')
    ->whereNotNull('fiche.cloture')
    ->where('stats.order_stats','=',5)->distinct('colis.id_colis')
    ->orderBy('colis.id_colis', 'desc')->paginate(80);
    //dd($Colis);

    //$Colis = $Colis->unique('id_colis');
    return response()->json($Colis);


}else {

    $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub','stats_colis.message')
    ->leftJoin('stats_colis', function($query) {
        $query->on('colis.id_colis','=','stats_colis.id_colis')
            ->whereRaw('stats_colis.id_colis IN (select MAX(a2.id_colis) from stats_colis as a2 join colis as u2 on u2.id_colis = a2.id_colis group by u2.id_colis)');
})
    ->leftJoin('commandes', 'colis.id_com','=','commandes.id_coms')
    ->join('fiche_fields', 'fiche_fields.id_colis', '=','colis.id_colis')
    ->join('fiche', 'fiche.id_fiche', '=','fiche_fields.id_fiche')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->leftJoin('stats', 'stats.id_stats', '=', 'colis.id_stats')
    ->where('validation','=',true)
    ->where('colis.wilaya','like','%'.$wil.'%')
    ->whereNotNull('fiche.closed_at')
    ->whereNotNull('fiche.cloture')
    ->where('colis.id_hub','=',$Data['hub'])
    ->where('stats.order_stats','=',5)->distinct('colis.id_colis')
    ->orderBy('colis.id_colis', 'desc')->paginate(80);
    //dd($Colis);

    //$Colis = $Colis->unique('id_colis');
    return response()->json($Colis);

}
   



}


public function data_failed_colis_updat($user,$id){


    $Data = $this->CheckLogin($user) ; 

    if($Data['guard'] == 'admin'){


        $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub','stats_colis.message')
        ->leftJoin('stats_colis', function($query) {
            $query->on('colis.id_colis','=','stats_colis.id_colis')
                ->whereRaw('stats_colis.id_colis IN (select MAX(a2.id_colis) from stats_colis as a2 join colis as u2 on u2.id_colis = a2.id_colis group by u2.id_colis)');
    })
        ->leftJoin('commandes', 'colis.id_com','=','commandes.id_coms')
        ->join('fiche_fields', 'fiche_fields.id_colis', '=','colis.id_colis')
        ->join('fiche', 'fiche.id_fiche', '=','fiche_fields.id_fiche')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->leftJoin('stats', 'stats.id_stats', '=', 'colis.id_stats')
        ->where('validation','=',true)
        ->where('colis.id_stats','=',$id)
        ->whereNotNull('fiche.closed_at')
        ->whereNotNull('fiche.cloture')
        ->where('stats.order_stats','=',5)->distinct('colis.id_colis')
        ->orderBy('colis.id_colis', 'desc')->paginate(80);
        //dd($Colis);
    
        //$Colis = $Colis->unique('id_colis');
        return response()->json($Colis);

    }else {



        $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub','stats_colis.message')
        ->leftJoin('stats_colis', function($query) {
            $query->on('colis.id_colis','=','stats_colis.id_colis')
                ->whereRaw('stats_colis.id_colis IN (select MAX(a2.id_colis) from stats_colis as a2 join colis as u2 on u2.id_colis = a2.id_colis group by u2.id_colis)');
    })
        ->leftJoin('commandes', 'colis.id_com','=','commandes.id_coms')
        ->join('fiche_fields', 'fiche_fields.id_colis', '=','colis.id_colis')
        ->join('fiche', 'fiche.id_fiche', '=','fiche_fields.id_fiche')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->leftJoin('stats', 'stats.id_stats', '=', 'colis.id_stats')
        ->where('validation','=',true)
        ->where('colis.id_stats','=',$id)
        ->where('colis.id_hub','=',$Data['hub'])
        ->whereNotNull('fiche.closed_at')
        ->whereNotNull('fiche.cloture')
        ->where('stats.order_stats','=',5)->distinct('colis.id_colis')
        ->orderBy('colis.id_colis', 'desc')->paginate(80);
        //dd($Colis);
    
        //$Colis = $Colis->unique('id_colis');
        return response()->json($Colis);


    }




}


public function  colis_filtre_tentatives($id,$tent){
$Data = $this->CheckLogin($id);


if($Data['guard']== 'admin'){
    $Colis = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub','stats_colis.message')
    ->WithCount('stats')
    ->having('stats_count','=', $tent)
    ->leftJoin('stats_colis', function($query) {
        $query->on('colis.id_colis','=','stats_colis.id_colis')
     ->whereRaw('stats_colis.id_colis IN (select MAX(a2.id_colis) from stats_colis as a2 join colis as u2 on u2.id_colis = a2.id_colis group by u2.id_colis)');
     })
    ->leftJoin('commandes', 'colis.id_com','=','commandes.id_coms')
    ->join('fiche_fields', 'fiche_fields.id_colis', '=','colis.id_colis')
    ->join('fiche', 'fiche.id_fiche', '=','fiche_fields.id_fiche')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->leftJoin('stats', 'stats.id_stats', '=', 'colis.id_stats')
    ->where('validation','=',true)
    ->whereNotNull('fiche.closed_at')
    ->whereNotNull('fiche.cloture')
    ->where('stats.order_stats','=',5)->distinct('colis.id_colis')
    ->orderBy('colis.id_colis', 'desc')->paginate(80);
    //dd($Colis);

    //$Colis = $Colis->unique('id_colis');
    return response()->json($Colis);


}else {

    $Colis = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub','stats_colis.message')
    ->WithCount('stats')
    ->having('stats_count','=', $tent)
    ->leftJoin('stats_colis', function($query) {
        $query->on('colis.id_colis','=','stats_colis.id_colis')
     ->whereRaw('stats_colis.id_colis IN (select MAX(a2.id_colis) from stats_colis as a2 join colis as u2 on u2.id_colis = a2.id_colis group by u2.id_colis)');
     })
    ->leftJoin('commandes', 'colis.id_com','=','commandes.id_coms')
    ->join('fiche_fields', 'fiche_fields.id_colis', '=','colis.id_colis')
    ->join('fiche', 'fiche.id_fiche', '=','fiche_fields.id_fiche')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->leftJoin('stats', 'stats.id_stats', '=', 'colis.id_stats')
    ->where('validation','=',true)
    ->where('colis.id_hub','=',$Data['hub'])
    ->whereNotNull('fiche.closed_at')
    ->whereNotNull('fiche.cloture')
    ->where('stats.order_stats','=',5)->distinct('colis.id_colis')
    ->orderBy('colis.id_colis', 'desc')->paginate(80);
    //dd($Colis);

    //$Colis = $Colis->unique('id_colis');
    return response()->json($Colis);


}


    




}

}
