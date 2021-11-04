<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fiche ;
use App\FicheColis;
use App\User ; 
use App\Colis ; 
use Illuminate\Support\Facades\DB;
class OnDeliveryController extends Controller
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
        return view('dashboard.pages.ondelivery.ondelivery_table');
    }
    public function list_delivery($id) {

$CountFiche = Fiche::where('id_fiche','=',$id)->count();

if($CountFiche > 0 ){


    return view('dashboard.pages.ondelivery.ondelivery_detail');


}else {


    return redirect('admin/ondelivery');


}
        


    }
   


   public function data_fiche_delevery(){
$DataUsers = Fiche::whereNull('closed_at')->whereNotNull('valid_fiche')->pluck('id_liv')->toArray();

$DatauserUnique = array_unique($DataUsers);


$DataLivr = User::whereIn('id',$DatauserUnique)->withCount('colis','fiche')->paginate(10);

return response()->json($DataLivr);

   } 




   public function filtre_fiche_delevery_validation($id){

    if($id == 1) {
        $DataUsers = Fiche::whereNull('closed_at')->whereNotNull('valid_fiche')->pluck('id_liv')->toArray();
    
        $DatauserUnique = array_unique($DataUsers);
        
        
        $DataLivr = User::whereIn('id',$DatauserUnique)->withCount('colis','fiche')->paginate(10);

    }elseif($id == 2){

        $DataUsers = Fiche::whereNull('closed_at')->whereNull('valid_fiche')->pluck('id_liv')->toArray();
    
        $DatauserUnique = array_unique($DataUsers);
        
        
        $DataLivr = User::whereIn('id',$DatauserUnique)->withCount('colis','fiche')->paginate(10);

    }else {
        $DataUsers = Fiche::whereNotNull('closed_at')->whereNotNull('valid_fiche')->pluck('id_liv')->toArray();
    
        $DatauserUnique = array_unique($DataUsers);
        
        
        $DataLivr = User::whereIn('id',$DatauserUnique)->withCount('colis','fiche')->paginate(10);



    }

    
    return response()->json($DataLivr);

    
       } 
    




public function stats_liv_fiche($idliv){

$StatsColi = Fiche::leftJoin('fiche_fields','fiche_fields.id_fiche','=','fiche.id_fiche')->leftJoin('colis','colis.id_colis','=','fiche_fields.id_colis')->whereNull('fiche.closed_at')->where('fiche.id_liv','=',$idliv)->where('fiche.valid_fiche','=',true)->count();

return response()->json($StatsColi);


    
}

public function data_colis_froute($idliv){

    $DataColis = FicheColis::select('colis.*','fiche_fields.*','stats.*','users.name')
    ->WithCount('stats')
    ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->leftJoin('colis','colis.id_colis','=','fiche_fields.id_colis')
    ->leftJoin('commandes','commandes.id_coms','=','colis.id_com')
    ->leftJoin('users','users.id','=','commandes.id_clt')
    ->leftJoin('stats','stats.id_stats','=','colis.id_stats')
    ->whereNull('fiche.closed_at')
    ->where('fiche.id_liv','=',$idliv)
    ->where('fiche.valid_fiche','=',true)
     ->where('colis.id_stats','!=',12)
    ->paginate(100);

    return response()->json($DataColis);
}


//filtre en livraison by livreur : 


public function filtre_fiche_delevery_livreur($id){

 


    

    $DataUsers = Fiche::whereNull('closed_at')->where('valid_fiche','=',true)->where('cloture','=',0)->pluck('id_liv')->toArray();

    //$DataUsers = Fiche::whereNull('closed_at')->where('valid_fiche','=',true)->pluck('id_fiche')->toArray();

    $DatauserUnique = array_unique($DataUsers);

 

    if (in_array($id, $DatauserUnique)) {

        $DataLivr = User::withCount(['deliv','montant as prix' => function($query) {
            $query->select(DB::raw('sum(price)'));
        }])->where('id','=',$id)->paginate(8);
        return response()->json($DataLivr);

    }else {

return true ;

    }

  
    //dd($DataLivr);




}

public function data_deliv_byliv($liv)
{





$ColisData = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
->leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
->where('fiche.id_liv','=',$liv)
->where('validation','=',true)
->whereNotNull('fiche.closed_at')
->whereNotNull('fiche.cloture')
->where('colis.id_stats','=',4)
->orderBy('colis.id_colis', 'desc')
->get();
//--Price Pour Livré ----------------------------------------------------------------------------------/

$TotalPrice =   Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
->where('validation','=',true)
->where('fiche.id_liv','=',$liv)
->whereNotNull('fiche.closed_at')
->whereNotNull('fiche.cloture')
->where('colis.id_stats','=',4)->sum('price'); 

$Colis = array('colis'=> $ColisData , 'amount'=> $TotalPrice );





return response()->json($Colis);



}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function detail_livreur($id)
    {
        
       $data = array();
        $DataLivr = User::withCount(['amount as prices' => function($query) {
            $query->select(DB::raw('sum(price)'));
        },'fiche','totalchnge','totalexist'])
        ->leftJoin('fiche','fiche.id_liv','=','users.id')
        ->where('fiche.cloture','=',false)
        ->where('id','=',$id)
        ->first();
  
        $get_delivredids = Fiche::leftJoin('fiche_fields','fiche_fields.id_fiche','=','fiche.id_fiche')
        ->leftJoin('colis','colis.id_colis','=','fiche_fields.id_colis')
        ->where('colis.id_stats','=',4)
        ->where('fiche.id_fiche','=',$id)
        ->pluck('colis.id_colis')
        ->toAraay();
    
        $sum_shipping = Colis::distinct()
        ->leftJoin('hub_wilayas', function($join)
            {
                $join->on('hub_wilayas.id_wilaya','=','colis.wilaya_id');
                $join->on('hub_wilayas.id_hub','=','colis.id_hub');
    
            })->whereIn('colis.id_colis',$get_delivredids)
            ->sum('hub_wilayas.comission');
    
    
          
        $data['detail'] = $DataLivr ; 
        $data['comission'] = $sum_shipping; 
        return response()->json($DataLivr);



    }
public function validate_delevery_gp(Request $request){

    $idliv = request('idliv');
    $date = date('Y-m-d h:i:s');
//dd($date);

        Fiche::where('id_liv', '=', $idliv)
        ->where('valid_fiche','=',true)
            ->update([
                'cloture' => true,
                'closed_at' => $date

            ]);




}

public function validate_delevery_fiche($id){
    $date = date('Y-m-d h:i:s');
    Fiche::where('id_fiche', '=', $id)->where('valid_fiche','=',true)
    ->update([
        'cloture' => true,
        'closed_at' => $date

    ]);


}

  public function data_colis_listfiche($user){


    $GetFiches = Fiche::where('fiche.id_liv','=',$user)
    ->whereNull('closed_at')
    ->where('valid_fiche','=',true)
    ->where('cloture','=',false)
    ->get();


return response()->json($GetFiches);

  }

public function data_wilaya_listfiche($liv){




    //dd($liv);

$DataWilayas = Fiche::leftJoin('fiche_fields','fiche_fields.id_fiche','=','fiche.id_fiche')
->leftjoin('colis','colis.id_colis','=','fiche_fields.id_colis')
->whereNull('closed_at')
->whereNotNull('valid_fiche')
->where('fiche.id_liv','=',$liv)
->groupBy('wilaya')
->pluck('wilaya')
->toArray();

return response()->json($DataWilayas);

}

public function data_filtre_listfiche($id){

    $DataColis = FicheColis::select('colis.*','fiche_fields.*','stats.*','users.name')
    ->WithCount('stats')
    ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->leftJoin('colis','colis.id_colis','=','fiche_fields.id_colis')
    ->leftJoin('commandes','commandes.id_coms','=','colis.id_com')
    ->leftJoin('users','users.id','=','commandes.id_clt')
    ->leftJoin('stats','stats.id_stats','=','colis.id_stats')
    ->whereNull('fiche.closed_at')
    ->where('fiche.id_fiche','=',$id)
    ->where('fiche.valid_fiche','=',true)
     ->where('colis.id_stats','!=',12)
    ->paginate(100);

    return response()->json($DataColis);


}

public function detail_livreur_fiche($id)
{
    
   
    $Data = array();
    $Price = Fiche::leftJoin('fiche_fields','fiche_fields.id_fiche','=','fiche.id_fiche')
    ->leftJoin('colis','colis.id_colis','=','fiche_fields.id_colis')
    ->where('colis.id_stats','=',4)
    ->where('fiche.id_fiche','=',$id)
    ->sum('colis.price');

    $get_delivredids = Fiche::leftJoin('fiche_fields','fiche_fields.id_fiche','=','fiche.id_fiche')
    ->leftJoin('colis','colis.id_colis','=','fiche_fields.id_colis')
    ->where('colis.id_stats','=',4)
    ->where('fiche.id_fiche','=',$id)
    ->pluck('colis.id_colis')
    ->toAraay();

    $sum_shipping = Colis::distinct()
    ->leftJoin('hub_wilayas', function($join)
        {
            $join->on('hub_wilayas.id_wilaya','=','colis.wilaya_id');
            $join->on('hub_wilayas.id_hub','=','colis.id_hub');

        })->whereIn('colis.id_colis',$get_delivredids)
        ->sum('hub_wilayas.comission');


    $CountAll = Fiche::leftJoin('fiche_fields','fiche_fields.id_fiche','=','fiche.id_fiche')
    ->where('fiche.id_fiche','=',$id)
    ->count();

    $CountWithChange = Fiche::leftJoin('fiche_fields','fiche_fields.id_fiche','=','fiche.id_fiche')
    ->leftJoin('colis','colis.id_colis','=','fiche_fields.id_colis')
    ->where('fiche.cloture','=',false)
    ->where('fiche.valid_fiche','=',true)
    ->where('colis.id_stats','!=',10)
    ->where('fiche.id_fiche','=',$id)
    ->count();

//dd($CountWithChange);

        $Data['ftotal_count']= $CountWithChange;
        $Data['fchtotal_count']= $CountAll;
        $Data['comission'] = $sum_shipping;
        $Data['fprice'] = $Price;
        return response()->json($Data);



}

public function view_livreur(){

    return view('dashboard.pages.deliver.deliver_data');
    
}

public function data_livreur($id){


    $DataColis = FicheColis::select('colis.*','fiche_fields.*','stats.*','users.name')
    ->WithCount('stats')
    ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->leftJoin('colis','colis.id_colis','=','fiche_fields.id_colis')
    ->leftJoin('commandes','commandes.id_coms','=','colis.id_com')
    ->leftJoin('users','users.id','=','commandes.id_clt')
    ->leftJoin('stats','stats.id_stats','=','colis.id_stats')
    ->whereNull('fiche.closed_at')
    ->where('fiche.id_liv','=',$id)
    ->where('fiche.valid_fiche','=',true)
     ->where('colis.id_stats','!=',12)
    ->paginate(100);

    return response()->json($DataColis);

}


  
  
  

}
