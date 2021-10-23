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

    public function CheckLogin($id)

    {
    
        $CheckLogin = User::select('roles.name as guard','users.hub_id as hub')
        ->leftJoin('model_has_roles','model_has_roles.model_id','=','users.id')
        ->leftJoin('roles','roles.id','=','model_has_roles.role_id')->where('users.id','=',$id)->first();
        
        //dd($CheckLogin['guard']);
        return $CheckLogin;
        
    
    
    }

    public function index()
    {
        return view('dashboard.pages.livraison.livraison_table');
    }
 public function list_livraison($id) {

//$Data= Fiche::where()
$DataFicheId = Fiche::whereNull('closed_at')->where('valid_fiche','=',true)->where('fiche.id_liv','=',$id)->pluck('id_fiche')->toArray();

$NameUser = User::where('id','=',$id)->pluck('name')->first();

    return view('dashboard.pages.livraison.livraison_detail')->with('listfiche',$DataFicheId)->with('namelivreur',$NameUser);

 }

public function update_retour_cash(){




   Colis::where('id_stats', '=', 3) ->update(['id_stats' => 13]);



}

 public function data_fiche_delevery(){
    $DataUsers = Fiche::whereNull('closed_at')->whereNotNull('valid_fiche')->pluck('id_liv')->toArray();
    
    $DatauserUnique = array_unique($DataUsers);
    
    
    $DataLivr = User::withCount(['amount as prices' => function($query) {
        $query->select(DB::raw('sum(price)'));
    }],'fiche')->whereIn('id',$DatauserUnique)->paginate(10);
   
    return response()->json($DataLivr);
    
       } 


       public function data_livreur_delevery($id){


        $CheckLogin = User::select('roles.name as guard','users.hub_id as hub')
        ->leftJoin('model_has_roles','model_has_roles.model_id','=','users.id')
        ->leftJoin('roles','roles.id','=','model_has_roles.role_id')->where('users.id','=',$id)->first();

        if($CheckLogin['guard'] == 'admin'){

            $DataUsers = Fiche::whereNull('closed_at')->where('valid_fiche','=',true)->where('cloture','=',0)->pluck('id_liv')->toArray();

            //$DataUsers = Fiche::whereNull('closed_at')->where('valid_fiche','=',true)->pluck('id_fiche')->toArray();
        
            $DatauserUnique = array_unique($DataUsers);
    
            
            $DataLivr = User::withCount(['deliv','montant as prix' => function($query) {
                $query->select(DB::raw('sum(price)'));
            }])->whereIn('id',$DatauserUnique)->paginate(10);
           
            //dd($DataLivr);
            return response()->json($DataLivr);


        }else {


            $DataUsers = Fiche::whereNull('closed_at')->where('valid_fiche','=',true)->where('cloture','=',0)->pluck('id_liv')->toArray();

            //$DataUsers = Fiche::whereNull('closed_at')->where('valid_fiche','=',true)->pluck('id_fiche')->toArray();
        
            $DatauserUnique = array_unique($DataUsers);
    
            
            $DataLivr = User::withCount(['deliv','montant as prix' => function($query) {
                $query->select(DB::raw('sum(price)'));
            }])
            ->where('users.hub_id','=',$CheckLogin['hub'])
            ->whereIn('id',$DatauserUnique)
            ->paginate(10);
           
            //dd($DataLivr);
            return response()->json($DataLivr);


        }



    




       }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_delivred($id)
    {
       
//--Colis Pour Livré ----------------------------------------------------------------------------------/

$Data = $this->CheckLogin($id);

if( $Data['guard'] == 'admin' ){


    $ColisData = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')
    ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->join('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
    ->join('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->where('validation','=',true)
    ->whereNotNull('fiche.closed_at')
    ->whereNotNull('fiche.cloture')
    ->where('colis.id_stats','=',4)
    ->groupBy('colis.id_colis')
    ->distinct('colis.id_colis')
    ->orderBy('colis.id_colis', 'desc')
    ->get();

//--Price Pour Livré ----------------------------------------------------------------------------------/

$TotalPrice =   Colis::where('validation','=',true)
->where('colis.id_stats','=',4)
->sum('price'); 




$Colis = array('colis'=> $ColisData , 'amount'=> $TotalPrice );


return response()->json($Colis);



}else {


    $ColisData = Colis::select('commandes.id_clt','colis.*','users.name','hubs.nom_hub')
    ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->join('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
    ->join('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->where('validation','=',true)
    ->where('commandes.id_hub','=',$Data['hub'])
    ->whereNotNull('fiche.closed_at')
    ->whereNotNull('fiche.cloture')
    ->where('colis.id_stats','=',4)
    ->orderBy('colis.id_colis', 'desc')
    ->get();

//-----Price Pour Livré ------------------------------------------------------/

$TotalPrice =   Colis::where('validation','=',true)
->where('colis.id_stats','=',4)
->where('colis.hub_id','=',$Data['hub'])
->sum('price'); 




$Colis = array('colis'=> $ColisData,'amount'=> $TotalPrice);


return response()->json($Colis);


}





    }

public function filtre_wil_delivred($id){



//--Colis Pour Livré ----------------------------------------------------------------------------------/

$ColisData = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
->leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
->where('validation','=',true)
->whereNotNull('fiche.closed_at')
->whereNotNull('fiche.cloture')
->where('colis.id_stats','=',4)
->where('colis.wilaya','like','%'.$id.'%')
->orderBy('colis.id_colis', 'desc')
->get();
//--Price Pour Livré ----------------------------------------------------------------------------------/

$TotalPrice =   Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
->where('validation','=',true)
->whereNotNull('fiche.closed_at')
->whereNotNull('fiche.cloture')
->where('colis.wilaya','like','%'.$id.'%')
->where('colis.id_stats','=',4)->sum('price'); 

$Colis = array('colis'=> $ColisData , 'amount'=> $TotalPrice );


return response()->json($Colis);


}

public function code_delivred($id){



//--Colis Pour Livré ----------------------------------------------------------------------------------/

$ColisData = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
->leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
->where('validation','=',true)
->whereNotNull('fiche.closed_at')
->whereNotNull('fiche.cloture')
->where('colis.id_stats','=',4)
->where('colis.id_colis','=',$id)
->orderBy('colis.id_colis', 'desc')
->get();
//--Price Pour Livré ----------------------------------------------------------------------------------/

$TotalPrice =   Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
->where('validation','=',true)
->whereNotNull('fiche.closed_at')
->whereNotNull('fiche.cloture')
->where('colis.id_colis','=',$id)
->where('colis.id_stats','=',4)->sum('price'); 

$Colis = array('colis'=> $ColisData , 'amount'=> $TotalPrice );


return response()->json($Colis);


}



    public function get_wils_delivred(){

$cols = Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
->where('validation','=',true)
->whereNotNull('fiche.closed_at')
->whereNotNull('fiche.cloture')
->groupBy('wilaya')->pluck('wilaya')->toArray();



        return response()->json($cols);
    }
public function get_returned($id){

$Data = $this->CheckLogin($id);

if($Data['guard'] == 'admin'){
    $ColisData = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')
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



}else {

    $ColisData = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')
    ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->where('validation','=',true)
    ->where('colis.id_hub','=',$Data['hub'])
    ->where('colis.id_stats','=',3)->orderBy('colis.id_colis', 'desc')->get();
    $TotalPrice =   Colis::
    where('validation','=',true)
    ->where('colis.id_hub','=',$Data['hub'])
    ->where('colis.id_stats','=',3)->sum('price'); 
$Colis = array('colis'=> $ColisData , 'amount'=> $TotalPrice );





    return response()->json($Colis);



}
  




}
public function get_returned_tentatives($tent,$user){

    $Data = $this->CheckLogin($user);

    if($Data['guard']=='admin'){


        $ColisData = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')->WithCount('stats')
        ->having('stats_count','=', $tent)
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


    }else {


        $ColisData = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')->WithCount('stats')
        ->having('stats_count','=', $tent)
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('validation','=',true)
        ->where('colis.id_hub','=',$Data['hub'])
        ->where('colis.id_stats','=',3)->orderBy('colis.id_colis', 'desc')->get();
    
        $TotalPrice =   Colis::
        where('validation','=',true)
        ->where('colis.id_hub','=',$Data['hub'])
        ->where('colis.id_stats','=',3)->sum('price'); 
    $Colis = array('colis'=> $ColisData , 'amount'=> $TotalPrice );
    
    
        return response()->json($Colis);


    }




}

public function get_returned_lv($id,$user){

$Data = $this->CheckLogin($user);

if($Data['guard'] == 'admin'){



    $ColisData = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')
    ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('fiche_fields', 'fiche_fields.id_colis', '=', 'colis.id_colis')
    ->leftJoin('fiche', 'fiche.id_fiche', '=', 'fiche_fields.id_fiche')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->where('validation','=',true)
    ->where('fiche.id_liv','=',$id)
    ->where('colis.id_stats','=',3)->orderBy('colis.id_colis', 'desc')->get();

    $TotalPrice =   Colis::
    where('validation','=',true)
    ->where('colis.id_stats','=',3)->sum('price'); 
$Colis = array('colis'=> $ColisData , 'amount'=> $TotalPrice );





    return response()->json($Colis);

}else {



    $ColisData = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')
    ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('fiche_fields', 'fiche_fields.id_colis', '=', 'colis.id_colis')
    ->leftJoin('fiche', 'fiche.id_fiche', '=', 'fiche_fields.id_fiche')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->where('validation','=',true)
    ->where('fiche.id_liv','=',$id)
    ->where('colis.id_hub','=',$Data['hub'])
    ->where('colis.id_stats','=',3)->orderBy('colis.id_colis', 'desc')->get();

    $TotalPrice =   Colis::
    where('validation','=',true)
    ->where('colis.id_stats','=',3)->sum('price'); 
$Colis = array('colis'=> $ColisData , 'amount'=> $TotalPrice );





    return response()->json($Colis);

}




}

public function get_returned_wilaya($wil,$id){

$Data  = $this->CheckLogin($id);

if($Data['guard'] == 'admin'){


    $ColisData = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')
    ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')

    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->where('validation','=',true)
    ->where('colis.wilaya','like','%'.$wil.'%')
    ->where('colis.id_stats','=',3)->orderBy('colis.id_colis', 'desc')->get();

    $TotalPrice =   Colis::
    where('validation','=',true)
    ->where('colis.id_stats','=',3)->sum('price'); 
$Colis = array('colis'=> $ColisData , 'amount'=> $TotalPrice );





    return response()->json($Colis);


}else {


    $ColisData = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')
    ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')

    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->where('validation','=',true)
    ->where('colis.id_hub','=',$Data['hub'])
    ->where('colis.wilaya','like','%'.$wil.'%')
    ->where('colis.id_stats','=',3)->orderBy('colis.id_colis', 'desc')->get();

    $TotalPrice =   Colis::
    where('validation','=',true)
    ->where('colis.id_hub','=',$Data['hub'])
    ->where('colis.id_stats','=',3)->sum('price'); 
$Colis = array('colis'=> $ColisData , 'amount'=> $TotalPrice );





    return response()->json($Colis);



}






}
public function get_returned_livreur($id){


    $ColisData =    Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')
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

public function get_returned_barecode($id){


    $ColisData =    Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')
    ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')

    ->where('validation','=',true)
    ->where('colis.id_colis','=',$id)
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
        ->leftJoin('users','users.id','=','commandes.id_clt')
        ->leftJoin('hubs','hubs.id_hub', '=', 'users.hub_id')
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

        $Colis = array('colis' => $ColisData ,'amount' => $TotalPrice );

        return response()->json($Colis);
    }
public function update_all_livre()
{




}
  
   
}
