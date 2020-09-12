<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StatsColis;
use App\Colis;
use App\User;
class StatsColisController extends Controller
{




    public function stats_show($id){

        $DataStatsColis = StatsColis::select('users.name','stats.field_stats','stats_colis.created_at')->leftJoin('stats','stats.id_stats','=','stats_colis.id_stats')->leftJoin('users','users.id','=','stats_colis.by_id_user')->where('stats_colis.id_colis','=',$id)->get();
        
        return response()->json($DataStatsColis);
        
        
        
        }
        

        public function add_stats_colis(Request $request){


            $idcolis   =  $request->input('idcolis');
            $idstats   =  $request->input('idstats');
            $iduser   =  $request->input('iduser');

    $data = StatsColis::where('id_colis','=',$idcolis)->latest('id_stats_colis')->first();



  
   $FindColis = Colis::find($idcolis);
   $FindColis->id_stats = $idstats;
   $FindColis->save();



    if($data['id_stats'] == 10 ){

        StatsColis::create(['id_stats' => $idstats ,
        'id_colis'=> $idcolis ,
        'by_id_user'=> $iduser 
      
         ]);


     } else {

        $FindStats = StatsColis::find($data['id_stats_colis']);
        $FindStats->id_stats = $idstats;
        $FindStats->save();



     }  



           
    


        }


//tracking section 


public function tracking_show($id){


    $DataColis = Colis::select('colis.*','commandes.id_clt')
    ->leftJoin('commandes','commandes.id_coms','=','colis.id_com')
    ->where('colis.id_colis','=',$id)->first()
    ->toArray();


    $DataStats = StatsColis::select('stats_colis.*','stats.field_stats','users.name')->leftJoin('stats','stats.id_stats','=','stats_colis.id_stats')
    ->leftJoin('users','users.id','=','stats_colis.by_id_user')
    ->where('stats_colis.id_colis','=',$id)
    ->orderBy('id_stats_colis')->get()
    ->toArray();





    $DataPartenaire = User::select('users.name','users.phone','users.service_client','hubs.nom_hub','users.email')
    ->leftJoin('hubs','hubs.id_hub','=','users.hub_id')->where('users.id','=',$DataColis['id_clt'])->first()
    ->toArray();


return response()->json(array('colis'=>$DataColis,'stats'=>$DataStats,'partenaire'=>$DataPartenaire));


}








}
