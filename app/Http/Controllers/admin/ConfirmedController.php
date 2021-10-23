<?php

namespace App\Http\Controllers\admin;

use App\Accounting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Colis ; 
class ConfirmedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.confirmed.confirmed_table');
    }

  
public function index_acounting(){


    return view('dashboard.pages.accounting.accounting_table');


}


public function index_facturation(){


       return view('dashboard.pages.accounting.facturation_table');

}


public function get_delivred_confirmed($part,$etat,$wil)
{




    
   
    if($part == "false"  and $etat == "false"  and $wil == "false" ){

     
        $ColisData = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('validation','=',true)
        ->whereNull('shipping_price')
        ->where(function ($query) {
            $query->where('id_stats', '=', 12)
                  ->orWhere('id_stats', '=', 13);
        })->orderBy('colis.id_colis', 'desc')
        ->paginate(120);


        $TotalPrice =   Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->
        where('validation','=',true)
        ->where('colis.id_stats','=',12)
        ->whereNull('shipping_price')
        ->sum('price'); 
        $PriceRetour =   Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->where('validation','=',true)
        ->where('colis.id_stats','=',13)
        ->whereNull('shipping_price')
        ->sum('price'); 
    



    }elseif($part !== "false"  and $etat !== "false"  and $wil == "false"){

        $ColisData = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('validation','=',true)
        ->where('commandes.id_clt','=',$part)
        ->where(function ($query) {
            $query->where('colis.id_stats', '=', 12)
                  ->orWhere('colis.id_stats', '=', 13);
        })
        ->where('id_stats','=',$etat)
        ->whereNull('shipping_price')
        ->orderBy('colis.id_colis', 'desc')
        ->paginate(120);


    $TotalPrice =   Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->
    where('validation','=',true)
    ->where('commandes.id_clt','=',$part)
    ->where('id_stats','=',$etat)
    ->where('colis.id_stats','=',12)
    ->whereNull('shipping_price')
    ->sum('price'); 
    $PriceRetour =   Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->
    where('validation','=',true)
    ->where('commandes.id_clt','=',$part)
    ->where('id_stats','=',$etat)
    ->where('colis.id_stats','=',13)
    ->whereNull('shipping_price')
    ->sum('price'); 


    }elseif($part !== "false"  and $wil !== "false"  and $etat == "false"){

        $ColisData = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('validation','=',true)
        ->where('commandes.id_clt','=',$part)
        ->whereNull('shipping_price')
        ->where(function ($query) {
            $query->where('colis.id_stats', '=', 12)
                  ->orWhere('colis.id_stats', '=', 13);
        })
        ->where('colis.wilaya','LIKE','%'.$wil.'%')
    ->orderBy('colis.id_colis', 'desc')->paginate(120);


    $TotalPrice =   Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->
    where('validation','=',true)
    ->where('commandes.id_clt','=',$part)
        ->where('colis.wilaya','LIKE','%'.$wil.'%')
    ->where('colis.id_stats','=',12)
    ->whereNull('shipping_price')
    ->sum('price'); 
    $PriceRetour =   Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->
    where('validation','=',true)
    ->where('commandes.id_clt','=',$part)
    ->where('colis.wilaya','LIKE','%'.$wil.'%')
    ->where('colis.id_stats','=',13)
    ->whereNull('shipping_price')
    ->sum('price'); 


    }elseif($etat !== "false"  and $wil !== "false"  and $part == "false"){

        $ColisData = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('validation','=',true)
        ->where('id_stats','=',$etat)
        ->whereNull('shipping_price')
        ->where(function ($query) {
            $query->where('colis.id_stats', '=', 12)
                  ->orWhere('colis.id_stats', '=', 13);
        })
        ->where('colis.wilaya','LIKE','%'.$wil.'%')
    ->orderBy('colis.id_colis', 'desc')->paginate(120);

    $TotalPrice =   Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->
    where('validation','=',true)
  ->where('id_stats','=',$etat)
        ->where('colis.wilaya','LIKE','%'.$wil.'%')
        ->whereNull('shipping_price')
    ->where('colis.id_stats','=',12)
    ->sum('price'); 
    $PriceRetour =   Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->
    where('validation','=',true)
    ->where('id_stats','=',$etat)
    ->whereNull('shipping_price')
    ->where('colis.wilaya','LIKE','%'.$wil.'%')
    ->where('colis.id_stats','=',13)
    ->sum('price'); 


    }elseif($etat !== "false"  and $wil !== "false"  and $part !== "false"){ 
        $ColisData = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('validation','=',true)
        ->where('id_stats','=',$etat)
        ->whereNull('shipping_price')
        ->where(function ($query) {
            $query->where('colis.id_stats', '=', 12)
                  ->orWhere('colis.id_stats', '=', 13);
        })
        ->where('commandes.id_clt','=',$part)
        ->where('colis.wilaya','LIKE','%'.$wil.'%')
    ->orderBy('colis.id_colis', 'desc')->paginate(120);

    $TotalPrice =   Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->
    where('validation','=',true)
  ->where('id_stats','=',$etat)
  ->where('commandes.id_clt','=',$part)
  ->whereNull('shipping_price')
        ->where('colis.wilaya','LIKE','%'.$wil.'%')
    ->where('colis.id_stats','=',12)
    ->sum('price'); 
    $PriceRetour =   Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->
    where('validation','=',true)
    ->where('id_stats','=',$etat)
    ->where('colis.wilaya','LIKE','%'.$wil.'%')
    ->where('commandes.id_clt','=',$part)
    ->whereNull('shipping_price')
    ->where('colis.id_stats','=',13)
    ->sum('price'); 


    }elseif($etat !== "false"  and $wil == "false" and $part == "false"){


        $ColisData = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('validation','=',true)
        ->where('id_stats','=',$etat)
        ->whereNull('shipping_price')
        ->where(function ($query) {
            $query->where('colis.id_stats', '=', 12)
                  ->orWhere('colis.id_stats', '=', 13);
        })
        ->orderBy('colis.id_colis', 'desc')
        ->paginate(120);


    $TotalPrice =   Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->
    where('validation','=',true)
    ->where('id_stats','=',$etat)
    ->where('colis.id_stats','=',12)
    ->whereNull('shipping_price')
    ->sum('price'); 
    $PriceRetour =   Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->
    where('validation','=',true)
    ->where('id_stats','=',$etat)
    ->whereNull('shipping_price')
    ->where('colis.id_stats','=',13)
    ->sum('price'); 



    }elseif($etat == "false" and $wil !== "false"  and $part == "false" ){


        $ColisData = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('validation','=',true)
        ->whereNull('shipping_price')
        ->where(function ($query) {
            $query->where('id_stats', '=', 12)
                  ->orWhere('id_stats', '=', 13);
        })
        ->where('colis.wilaya','like','%'.$wil.'%')
    ->orderBy('colis.id_colis', 'desc')->paginate(120);


    $TotalPrice =   Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->
    where('validation','=',true)
    ->where('colis.wilaya','LIKE','%'.$wil.'%')
    ->whereNull('shipping_price')
    ->where('colis.id_stats','=',12)->sum('price'); 
    $PriceRetour =   Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->
where('validation','=',true)
->where('colis.wilaya','LIKE','%'.$wil.'%')
->whereNull('shipping_price')
->where('colis.id_stats','=',13)->sum('price'); 


    }elseif($etat == "false" and $wil == "false" and $part !== "false"){



        $ColisData = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('validation','=',true)
        ->whereNull('shipping_price')
        ->where('commandes.id_clt','=',$part)
        ->where(function ($query) {
            $query->where('colis.id_stats', '=', 12)
                  ->orWhere('colis.id_stats', '=', 13);
        })
    ->orderBy('colis.id_colis', 'desc')->paginate(120);

    
    $TotalPrice =   Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->
    where('validation','=',true)
    ->where('commandes.id_clt','=',$part)
    ->whereNull('shipping_price')
    ->where('colis.id_stats','=',12)->sum('price'); 
    $PriceRetour =   Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->
where('validation','=',true)
->where('commandes.id_clt','=',$part)
->whereNull('shipping_price')
->where('colis.id_stats','=',13)->sum('price'); 

    }


    




$Colis = array('colis'=> $ColisData , 'amount'=> $TotalPrice,'retour'=>$PriceRetour );


    return response()->json($Colis);

}

 public function index_facturation_detail($id){

    return view('dashboard.pages.accounting.facturation_table_detail');

 }
 
}
