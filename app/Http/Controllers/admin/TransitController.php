<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Transit;
use App\Colis;
use App\StatsColis;
use App\TransitColis;
use PDF;
use Illuminate\Support\Facades\DB;
class TransitController extends Controller
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

    public function transit_envoie()
    {
        return view('dashboard.pages.transit.transit_table_send');
    }
    public function transit_retour()
    {
        return view('dashboard.pages.transit.transit_table_receive');
    }
    public function detail($id)
    {
        return view('dashboard.pages.transit.transit_detail');
    }

    public function add_transit()
    {
        return view('dashboard.pages.transit.transit_add');
    }

    public function detail_recp(){



        return view('dashboard.pages.transit.transit_detail_receive');


    }

/// Sender Section ---------------- Data Transit ---------
public function transit_data_send($id){

$Data = $this->CheckLogin($id);


if($Data['guard'] == 'admin'){


    $Data = Transit::select('transit.*','hubs.nom_hub')
    ->withCount(['colis','colisapprvd'])
    ->leftJoin('hubs','hubs.id_hub','=','transit.receive_hub')
  
    ->orderBy('transit.confirmed','ASC')
->paginate(10);
    
    
    return response()->json($Data);

}else {


    $Data = Transit::select('transit.*','hubs.nom_hub')
    ->withCount(['colis','colisapprvd'])
    ->leftJoin('hubs','hubs.id_hub','=','transit.receive_hub')

    ->orderBy('transit.send_it','ASC')
    ->where('transit.id_hub','=',$Data['hub'])->paginate(10);
    
    
    return response()->json($Data);



}





}


/// REception Section ---------------- Data Transit ---------

public function transit_data_receiver($id){

    $Data = $this->CheckLogin($id);


    if($Data['guard'] == 'admin'){


    
    $Data = Transit::select('transit.*','hubs.nom_hub')
    ->withCount(['colis','colisapprvd'])
    ->leftJoin('hubs','hubs.id_hub','=','transit.receive_hub')
  ->where('transit.send_it','=',true)
    ->orderBy('transit.confirmed','ASC')
->paginate(10);
    
    

    
    }else {


    
        $Data = Transit::select('transit.*','hubs.nom_hub')
        ->withCount(['colis','colisapprvd'])
        ->leftJoin('hubs','hubs.id_hub','=','transit.receive_hub')
        ->where('transit.send_it','=',true)
        ->orderBy('transit.confirmed','ASC')
        ->where('transit.receive_hub','=',$Data['hub'])->paginate(10);





    }

    return response()->json($Data);
    }




public function transit_data_infos($id){

    $User = User::leftJoin('hubs','hubs.id_hub','=','users.hub_id')
    ->find($id);

    return response()->json($User);
}

public function transit_data_add(Request $request){

    $field =  $request->input('field');
    $vers_hub =  $request->input('vers_hub');
    $de_hub =  $request->input('de_hub');
    $idcord =  $request->input('idcord');
 
   


 Transit::create([
     'receive_hub' => $vers_hub,
     'id_cordem' => $idcord,
     'id_hub' => $de_hub,
     'confirmed' => false,
     'field_transit' => $field ]);




}
public function transit_data_colis($id){

  $Data=   TransitColis::select('transitcolis.*','users.name as partenaire','colis.*')
  ->leftJoin('colis','colis.id_colis','=','transitcolis.id_colis')
  ->leftJoin('commandes','commandes.id_coms','=','colis.id_com')
  ->leftJoin('users','users.id','=','commandes.id_clt')
    ->where('id_transit','=',$id)

    ->paginate(20);
return response()->json($Data);




}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function transit_add_colis(Request $request)
    {
        $idtrans =  $request->input('idtransit');
        $idcolis =  $request->input('idcolis');
$Count = TransitColis::where('id_transit','=',$idtrans)->where('id_colis','=',$idcolis)->count();


$CountHouse = Colis::where(function ($query) {
    $query->where('id_stats', '=', NULL)
          ->orWhere('id_stats', '=', 11);
})->where('id_colis','=',$idcolis)->count();

 if ($CountHouse > 0 ){

    if($Count == 0)
    {
      
        $EditColis = Colis::find($idcolis);
        $EditColis->id_stats = 15  ;
        
        $EditColis->save();


        TransitColis::create([
            'id_colis' => $idcolis  , 
            'id_transit' => $idtrans 
            ]);
    }

 }


    }

    public function transit_remove_colis(Request $request)
    {
        $idtrans =  $request->input('idtransit');
        $idcolis =  $request->input('idcolis');
$Count = TransitColis::where('id_transit','=',$idtrans)->where('id_colis','=',$idcolis)->count();



    if($Count > 0)
    {
      
        $EditColis = Colis::find($idcolis);
        $EditColis->id_stats = 11  ;
        
        $EditColis->save();


     
            $DelStats =  TransitColis::where('id_colis','=',$idcolis)->where('id_transit','=',$idtrans)->first();
            $DelStats->delete();


    }

 


    }  

public function transit_approv_colis($id){


    $EditTransColis = TransitColis::find($id);
    $EditTransColis->approved = true  ;
    
    $EditTransColis->save();

}
public function transit_unselect_colis($id){


    $EditTransColis = TransitColis::find($id);
    $EditTransColis->approved = false  ;
    
    $EditTransColis->save();

}

public function transit_send_valid($id){


    

    $get_colis = TransitColis::where('id_transit','=',$id)->get();

    $get_hubs = Transit::select('sender.nom_hub as send','receiver.nom_hub as receive','transit.id_cordem as iduser')
    ->leftJoin('hubs as sender','sender.id_hub','=','transit.id_hub')
    ->leftJoin('hubs as receiver','receiver.id_hub','=','transit.receive_hub')
    ->first();

    $remarque = 'de  '.$get_hubs['send'].'vers '.$get_hubs['receive']; 

    $count_colis = count($get_colis);


    for($i = 0 ; $i < $count_colis ; $i++){


        StatsColis::create([
        'id_stats'=> 15 ,
        'id_colis' => $get_colis[$i]['id_colis'] ,
        'message'=> $remarque,
        'by_id_user'=> $get_hubs['iduser']
        ]);

    }

    $EditTrans = Transit::find($id);
    $EditTrans->send_it = true  ;
    $EditTrans->save();

}
public function transit_send_recu(Request $request){
$id = $request->input('idtransit');
$idcord = $request->input('idcord');
$idhub = $request->input('hub');


    $EditTrans = Transit::find($id);
    $EditTrans->confirmed = true  ;
    $EditTrans->id_cordre = $idcord;
    $EditTrans->save();

    $GetColisTransit = TransitColis::where('id_transit','=',$id)->pluck('id_colis')->toArray();
    $CountTr = count($GetColisTransit);
    for($x = 0; $x < $CountTr; $x++ ){



        $EditTrans = Colis::find($GetColisTransit[$x]);
        $EditTrans->id_hub = $idhub  ;
        $EditTrans->id_stats = 11  ;
        
        $EditTrans->save();

    }

    
}
  
public function view_transit($idtransit){



    $dataTransitColis = TransitColis::select('transitcolis.*','colis.*','partenaire.name as partenaire','partenaire.adresse as partenaire_adresse','colis.created_at as created')
    ->withCount('stats')
    ->leftJoin('transit','transit.id_transit','=','transitcolis.id_transit')
    ->leftJoin('colis','colis.id_colis','=','transitcolis.id_colis')
    ->leftJoin('commandes','commandes.id_coms','=','colis.id_com')
    ->leftJoin('users as partenaire','partenaire.id','=','commandes.id_clt')
    ->where('transitcolis.id_transit','=',$idtransit)
    ->get();
//dd($dataTransitColis);
        $dataPrice = TransitColis::leftJoin('transit','transit.id_transit','=','transitcolis.id_transit')
        ->leftJoin('colis','colis.id_colis','=','transitcolis.id_colis')
        ->where('transitcolis.id_transit','=',$idtransit)
        ->pluck('colis.price')
        ->all();


//dd($dataPrice);

    $DataTransitInfos = Transit::select('transit.*','sender.nom_hub as send','receiver.nom_hub as receive')
    ->withCount('colis')
    ->leftJoin('hubs as sender','sender.id_hub','=','transit.id_hub')
    ->leftJoin('hubs as receiver','receiver.id_hub','=','transit.receive_hub')
    ->where('id_transit','=',$idtransit)
    ->first();


/*
$total = 0 ;

$val = (float)$dataPrice['0'] ;
dd($val);
for($i = 0 ; $i < $DataFiheInfos['fichecolis_count'] ; $i++){

$total = $total + intval(number_format($dataPrice[$i], 2, '.', ''))  ;


}
*/

$pdf = PDF::loadView('dashboard.pages.transit.transit_pdf',['data' => $DataTransitInfos,'colis'=>$dataTransitColis]
);  

return $pdf->stream('feuilledetransit.pdf');
}
   
}
