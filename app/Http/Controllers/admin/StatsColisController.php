<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

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




if($data['id_stats'] == 11 ){
    $FindlastStats = StatsColis::where('id_colis','=',$idcolis)->latest()->take(2)->pluck('id_stats')->toArray();
    $FindlastStatsid = StatsColis::where('id_colis','=',$idcolis)->latest()->take(2)->pluck('id_stats_colis')->toArray();

    StatsColis::where('id_stats_colis',$FindlastStatsid['0'])->delete();
    StatsColis::where('id_stats_colis',$FindlastStatsid['1'])->delete();
    
   $FindColis = Colis::find($idcolis);
   $FindColis->id_stats = $idstats;
   $FindColis->save();


   StatsColis::create(['id_stats' => $idstats ,
        'id_colis'=> $idcolis ,
        'by_id_user'=> $iduser 
      
         ]);



 }else {







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
    


        }

//Part mise a jour groupé 


public function add_stats_colis_gp(Request $request){


    $idcolis   =  $request->input('idcolis');
    $idstats   =  $request->input('idstats');
    $iduser   =  $request->input('iduser'); 


$Count = count($idcolis);

for($i= 0 ;$i < $Count ;$i++)
{
    $data = StatsColis::where('id_colis','=',$idcolis[$i])->latest('id_stats_colis')->first();

    echo $data['id_stats'];

    if($data['id_stats'] == 11 ){
        $FindlastStats = StatsColis::where('id_colis','=',$idcolis[$i])->latest()->take(2)->pluck('id_stats')->toArray();
        $FindlastStatsid = StatsColis::where('id_colis','=',$idcolis[$i])->latest()->take(2)->pluck('id_stats_colis')->toArray();
    
        StatsColis::where('id_stats_colis',$FindlastStatsid['0'])->delete();
        StatsColis::where('id_stats_colis',$FindlastStatsid['1'])->delete();
        
       $FindColis = Colis::find($idcolis[$i]);
       $FindColis->id_stats = $idstats;
       $FindColis->save();

       StatsColis::create(['id_stats' => $idstats ,
       'id_colis'=> $idcolis[$i] ,
       'by_id_user'=> $iduser 
     
        ]);

    }else {

   $FindColis = Colis::find($idcolis[$i]);
   $FindColis->id_stats = $idstats;
   $FindColis->save();



    if($data['id_stats'] == 10 ){

        StatsColis::create(['id_stats' => $idstats ,
        'id_colis'=> $idcolis[$i]  ,
        'by_id_user'=> $iduser 
      
         ]);


     } else {

        $FindStats = StatsColis::find($data['id_stats_colis']);
        $FindStats->id_stats = $idstats;
        $FindStats->save();



     }  



    }





}



}




        public function add_stats_redispatch(Request $request){
    
    
            $idcolis   =  $request->input('idcolis');
            $idstats   =  $request->input('idstats');
            $iduser   =  $request->input('iduser');

    $data = StatsColis::where('id_colis','=',$idcolis)->orderBy('id_stats_colis', 'desc')->take(1)->first();



  
   $FindColis = Colis::find($idcolis);
   $FindColis->id_stats = 11;
   $FindColis->save();


//dd($data['id_stats_colis']);
    if($data['id_stats'] == 10 ){

        StatsColis::insert([
            [
            'id_stats' => $idstats ,
            'id_colis'=> $idcolis ,
            'by_id_user'=> $iduser ,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ],
            [
            'id_stats' => 11 ,
            'id_colis'=> $idcolis ,
            'by_id_user'=> $iduser 
            ,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
            ]);


     } else {
          
        $FindlastStats = StatsColis::where('id_colis','=',$idcolis)->latest()->take(2)->pluck('id_stats')->toArray();
        $FindlastStatsid = StatsColis::where('id_colis','=',$idcolis)->latest()->take(2)->pluck('id_stats_colis')->toArray();

       // dd($FindlastStats[0]);

        if($FindlastStats[1] == 10){
          //  dd('sdsdsdsd');
// delete one 
 StatsColis::where('id_stats_colis',$FindlastStatsid['0'])->delete();

StatsColis::insert([
[
'id_stats' => $idstats ,
'id_colis'=> $idcolis ,
'by_id_user'=> $iduser ,
'created_at' => Carbon::now(),
'updated_at' => Carbon::now()
],
[
'id_stats' => 11 ,
'id_colis'=> $idcolis ,
'by_id_user'=> $iduser 
,
'created_at' => Carbon::now(),
'updated_at' => Carbon::now()
]
]);

        }else {
//delete two situations

StatsColis::where('id_stats_colis',$FindlastStatsid['0'])->delete();
StatsColis::where('id_stats_colis',$FindlastStatsid['1'])->delete();

StatsColis::insert([
[
'id_stats' => $idstats ,
'id_colis'=> $idcolis ,
'by_id_user'=> $iduser ,
'created_at' => Carbon::now(),
'updated_at' => Carbon::now()
],
[
'id_stats' => 11 ,
'id_colis'=> $idcolis ,
'by_id_user'=> $iduser 
,
'created_at' => Carbon::now(),
'updated_at' => Carbon::now()
]
]);

        }

      /*  $FindStats = StatsColis::find($data['id_stats_colis']);
        $FindStats->id_stats = $idstats;
        $FindStats->save();
*/


     }  



           
    


        }





        public function add_stats_redispatch_gp(Request $request){ 





            $idcolis   =  $request->input('idcolis');
            $idstats   =  $request->input('idstats');
            $iduser   =  $request->input('iduser');


            $Count = count($idcolis);

            for($i= 0 ;$i < $Count ;$i++)

            {

    $data = StatsColis::where('id_colis','=',$idcolis[$i])->orderBy('id_stats_colis', 'desc')->take(1)->first();



  
   $FindColis = Colis::find($idcolis[$i]);
   $FindColis->id_stats = 11;
   $FindColis->save();


//dd($data['id_stats_colis']);
    if($data['id_stats'] == 10 ){

        StatsColis::insert([
            [
            'id_stats' => $idstats ,
            'id_colis'=> $idcolis[$i],
            'by_id_user'=> $iduser ,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ],
            [
            'id_stats' => 11 ,
            'id_colis'=> $idcolis[$i],
            'by_id_user'=> $iduser 
            ,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
            ]);


     } else {
          
        $FindlastStats = StatsColis::where('id_colis','=',$idcolis[$i])->latest()->take(2)->pluck('id_stats')->toArray();
        $FindlastStatsid = StatsColis::where('id_colis','=',$idcolis[$i])->latest()->take(2)->pluck('id_stats_colis')->toArray();

       // dd($FindlastStats[0]);

        if($FindlastStats[1] == 10){
          //  dd('sdsdsdsd');
// delete one 
 StatsColis::where('id_stats_colis',$FindlastStatsid['0'])->delete();

StatsColis::insert([
[
'id_stats' => $idstats ,
'id_colis'=> $idcolis[$i] ,
'by_id_user'=> $iduser ,
'created_at' => Carbon::now(),
'updated_at' => Carbon::now()
],
[
'id_stats' => 11 ,
'id_colis'=> $idcolis[$i] ,
'by_id_user'=> $iduser 
,
'created_at' => Carbon::now(),
'updated_at' => Carbon::now()
]
]);

        }else {
//delete two situations

StatsColis::where('id_stats_colis',$FindlastStatsid['0'])->delete();
StatsColis::where('id_stats_colis',$FindlastStatsid['1'])->delete();

StatsColis::insert([
[
'id_stats' => $idstats ,
'id_colis'=> $idcolis[$i] ,
'by_id_user'=> $iduser ,
'created_at' => Carbon::now(),
'updated_at' => Carbon::now()
],
[
'id_stats' => 11 ,
'id_colis'=> $idcolis[$i] ,
'by_id_user'=> $iduser 
,
'created_at' => Carbon::now(),
'updated_at' => Carbon::now()
]
]);

        }

      /*  $FindStats = StatsColis::find($data['id_stats_colis']);
        $FindStats->id_stats = $idstats;
        $FindStats->save();
*/


     }  





    }





        }

//tracking section 


public function tracking_show($id){


    $DataColis = Colis::select('colis.*','commandes.id_clt')
    ->leftJoin('commandes','commandes.id_coms','=','colis.id_com')
    ->where('colis.id_colis','=',$id)->first()
    ->toArray();


    $DataStats =  StatsColis::select('stats_colis.*','stats.field_stats','users.name as cordinateur','profil.name as livreur','fiche.id_fiche as fiche','stats.order_stats as order')
    ->leftJoin('stats','stats.id_stats','=','stats_colis.id_stats')
    ->leftJoin('users','users.id','=','stats_colis.by_id_user')
    ->leftJoin('fiche_fields','fiche_fields.id_colis','=','stats_colis.id_colis')
    ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->leftJoin('users as profil','profil.id','=','fiche.id_liv')
    ->where('stats_colis.id_colis','=',$id)
    ->where('stats.order_stats' ,'!=',7)
    ->orderBy('id_stats_colis')->get()
    ->toArray();





    $DataPartenaire = User::select('users.name','users.phone','users.service_client','hubs.nom_hub','users.email')
    ->leftJoin('hubs','hubs.id_hub','=','users.hub_id')->where('users.id','=',$DataColis['id_clt'])->first()
    ->toArray();


return response()->json(array('colis'=>$DataColis,'stats'=>$DataStats,'partenaire'=>$DataPartenaire));


}

// search tracking 



public function tracking_show_search($id){


    $DataColis = Colis::select('colis.*','commandes.id_clt')
    ->leftJoin('commandes','commandes.id_coms','=','colis.id_com')
    ->where('colis.id_colis','=',$id)->first()
    ->toArray();


    $DataStats =  StatsColis::select('stats_colis.*','stats.field_stats','users.name as cordinateur','profil.name as livreur','fiche.id_fiche as fiche','stats.order_stats as order')
    ->leftJoin('stats','stats.id_stats','=','stats_colis.id_stats')
    ->leftJoin('users','users.id','=','stats_colis.by_id_user')
    ->leftJoin('fiche_fields','fiche_fields.id_colis','=','stats_colis.id_colis')
    ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->leftJoin('users as profil','profil.id','=','fiche.id_liv')
    ->where('stats_colis.id_colis','=',$id)
    ->where('stats.order_stats' ,'!=',7)
    ->orderBy('id_stats_colis')->get()
    ->toArray();





    $DataPartenaire = User::select('users.name','users.phone','users.service_client','hubs.nom_hub','users.email')
    ->leftJoin('hubs','hubs.id_hub','=','users.hub_id')->where('users.id','=',$DataColis['id_clt'])->first()
    ->toArray();


return response()->json(array('colis'=>$DataColis,'stats'=>$DataStats,'partenaire'=>$DataPartenaire));


}






}
