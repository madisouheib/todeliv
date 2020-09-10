<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fiche ;
use App\FicheColis;
use App\User ; 
use Illuminate\Support\Facades\DB;
class OnDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    $DataColis = Fiche::select('colis.*','fiche_fields.*','stats.*','users.name')->leftJoin('fiche_fields','fiche_fields.id_fiche','=','fiche.id_fiche')
    ->leftJoin('colis','colis.id_colis','=','fiche_fields.id_colis')
    ->leftJoin('commandes','commandes.id_coms','=','colis.id_com')
    ->leftJoin('users','users.id','=','commandes.id_clt')
    ->leftJoin('stats','stats.id_stats','=','colis.id_stats')
    ->whereNull('fiche.closed_at')
    ->where('fiche.id_liv','=',$idliv)
    ->where('fiche.valid_fiche','=',true)
    ->paginate(10);

    return response()->json($DataColis);
}



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function detail_livreur($id)
    {
        
       
        $DataLivr = User::withCount(['amount as prices' => function($query) {
            $query->select(DB::raw('sum(price)'));
        },'fiche','totalchnge','totalexist'])->leftJoin('fiche','fiche.id_liv','=','users.id')->where('fiche.cloture','=',false)->where('id','=',$id)->first();
  
        return response()->json($DataLivr);



    }
public function validate_delevery_gp(Request $request){

    $idliv = request('idliv');
$date = date('Y-m-d h:i:s');
//dd($date);

Fiche::where('id_liv', '=', $idliv)
    ->update([
        'cloture' => true,
        'closed_at' => $date

    ]);




}
  
  
  

}
