<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fiche ;
use App\User ; 
use App\Colis ; 
use Illuminate\Support\Facades\DB;
class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.livraison.livraison_table');
    }
 public function list_livraison($id) {

//$Data= Fiche::where()
$DataFicheId = Fiche::whereNull('closed_at')->whereNotNull('valid_fiche')->where('fiche.id_liv','=',$id)->pluck('id_fiche')->toArray();

$NameUser = User::where('id','=',$id)->pluck('name')->first();

    return view('dashboard.pages.livraison.livraison_detail')->with('listfiche',$DataFicheId)->with('namelivreur',$NameUser);

 }



 public function data_fiche_delevery(){
    $DataUsers = Fiche::whereNull('closed_at')->whereNotNull('valid_fiche')->pluck('id_liv')->toArray();
    
    $DatauserUnique = array_unique($DataUsers);
    
    
    $DataLivr = User::withCount(['amount as prices' => function($query) {
        $query->select(DB::raw('sum(price)'));
    }],'fiche')->whereIn('id',$DatauserUnique)->paginate(10);
   
    return response()->json($DataLivr);
    
       } 


       public function data_livreur_delevery(){

        $DataUsers = Fiche::whereNull('closed_at')->where('valid_fiche','=',true)->pluck('id_liv')->toArray();
    
        $DatauserUnique = array_unique($DataUsers);

        
        $DataLivr = User::withCount(['montant as prix' => function($query) {
            $query->select(DB::raw('sum(price)'));
        }])->whereIn('id',$DatauserUnique)->paginate(10);
       
        //dd($DataLivr);
        return response()->json($DataLivr);




       }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_delivred()
    {
       


        $ColisData = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('validation','=',true)
        ->where('colis.id_stats','=',4)->orderBy('colis.id_colis', 'desc')->get();
        $TotalPrice =   Colis::
        where('validation','=',true)
        ->where('colis.id_stats','=',4)->sum('price'); 
$Colis = array('colis'=> $ColisData , 'amount'=> $TotalPrice );
    




        return response()->json($Colis);

    }

public function get_returned(){


    $ColisData = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
    ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->where('validation','=',true)
    ->where('colis.id_stats','=',3)->orderBy('colis.id_colis', 'desc')->get();
    $TotalPrice =   Colis::
    where('validation','=',true)
    ->where('colis.id_stats','=',3)->sum('price'); 
$Colis = array('colis'=> $ColisData , 'amount'=> $TotalPrice );





    return response()->json($Colis);





}


public function get_returned_livreur($id){


    $ColisData =    Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
    ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
    ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->where('validation','=',true)
    ->where('fiche.id_liv','=',$id)
    ->where('colis.id_stats','=',3)
    ->orderBy('colis.id_colis', 'desc')
    ->get();

    $TotalPrice =   Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
    ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->where('validation','=',true)
    ->where('fiche.id_liv','=',$id)
    ->where('colis.id_stats','=',3)
    ->sum('price'); 

    $Colis = array('colis' => $ColisData , 'amount' => $TotalPrice );

    return response()->json($Colis);


}





    public function get_delivred_livreur($id){



        $ColisData =    Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
        ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
        ->where('validation','=',true)
        ->where('fiche.id_liv','=',$id)
        ->where('colis.id_stats','=',4)
        ->orderBy('colis.id_colis', 'desc')
        ->get();

        $TotalPrice =   Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
        ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
        ->where('validation','=',true)
        ->where('fiche.id_liv','=',$id)
        ->where('colis.id_stats','=',4)
        ->sum('price'); 

        $Colis = array('colis' => $ColisData , 'amount' => $TotalPrice );

        return response()->json($Colis);
    }
public function update_all_livre()
{




}
  
   
}
