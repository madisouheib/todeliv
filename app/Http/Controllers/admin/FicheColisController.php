<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FicheColis;
use App\Fiche;
use App\Colis;
use PDF;
use App\StatsColis;
use Illuminate\Support\Facades\DB;
class FicheColisController extends Controller
{


public function data_fiche_colis($id){


$DataFicheColis = FicheColis::select('colis.*','fiche_fields.*','fiche.*','users.name as partenaire')->leftJoin('colis','colis.id_colis','=','fiche_fields.id_colis')->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')->leftJoin('commandes','commandes.id_coms','=','colis.id_com')->leftJoin('users','users.id','=','commandes.id_clt')->where('fiche_fields.id_fiche','=',$id)->paginate(10);


return response()->json($DataFicheColis);

}
public function data_colis_inhouse(){


    $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->leftJoin('users', 'users.id', '=', 'commandes.id_clt')->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')->where('validation','=',true)->where('id_stats','=',null)->orWhere('id_stats','=',11)->orderBy('id_colis', 'desc')->get();

    return response()->json($Colis);
    
}

public function delete_colis_fiche($id){

    

    $delColis  = FicheColis::find($id);
    $idColis = $delColis['id_colis'];
    $DelStats =  StatsColis::where('id_colis','=',$idColis)->latest('id_stats_colis')->first();
    $DelStats->delete();

    $delColis->delete();

    $EditColis = Colis::find($idColis);
$EditColis->id_stats = null  ;

$EditColis->save();




}

public function add_colis_fiche(Request $request){

    $idcolis = request('idcolis');
    $idfiche = request('idfiche');
    $iduser = request('iduser');
    $CountColis = FicheColis::where('id_fiche','=',$idfiche)->where('fiche_fields.id_colis','=',$idcolis)->count();
 
    $DataValidation =Colis::leftJoin('commandes','commandes.id_coms','=','colis.id_com')->where('colis.id_colis','=',$idcolis)->where('colis.validation','=',true)->where(function ($query) {
            $query->where('colis.id_stats', '=', null)
                  ->orWhere('colis.id_stats', '=', 11);
        })->count();
if($DataValidation == 1){





 if($CountColis == 0){



    FicheColis::create([
     'id_fiche' => $idfiche ,
    'id_colis'=> $idcolis ,
    'id_user'=> $iduser 

  
     ]);


     StatsColis::create(['id_stats' => 10 ,
     'id_colis'=> $idcolis ,
     'by_id_user'=> $iduser 
   
      ]);



$EditColis = Colis::find($idcolis);
$EditColis->id_stats = 10  ;

$EditColis->save();


    }
 }


 $DataFicheColis = FicheColis::select('colis.*','fiche_fields.*','fiche.*','users.name as partenaire')->leftJoin('colis','colis.id_colis','=','fiche_fields.id_colis')->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')->leftJoin('commandes','commandes.id_coms','=','colis.id_com')->leftJoin('users','users.id','=','commandes.id_clt')->where('fiche_fields.id_fiche','=',$idfiche)->paginate(10);


 return response()->json($DataFicheColis);

   

}

public function pdf_all_fiche($idfiche){

$dataFicheColis = FicheColis::select('fiche_fields.*','colis.*','partenaire.name as partenaire','partenaire.adresse as partenaire_adresse','colis.created_at as created')->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')->leftJoin('colis','colis.id_colis','=','fiche_fields.id_colis')->leftJoin('commandes','commandes.id_coms','=','colis.id_com')->leftJoin('users as partenaire','partenaire.id','=','commandes.id_clt')->where('fiche.id_fiche','=',$idfiche)->get();
$dataPrice = FicheColis::leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')->leftJoin('colis','colis.id_colis','=','fiche_fields.id_colis')->where('fiche_fields.id_fiche','=',$idfiche)->pluck('colis.price')->all();


//dd($dataPrice);

$DataFiheInfos = Fiche::select('fiche.*','livreur.name as livreur','hubs.nom_hub as name_hub','cordinateur.name as cordinateur')->withCount(['price as prices' => function($query) {
    $query->select(DB::raw('sum(price)'));
},'fichecolis'])->leftJoin('users as livreur','livreur.id','=','fiche.id_liv')->leftJoin('users as cordinateur','cordinateur.id','=','fiche.id_cord')->leftJoin('hubs','hubs.id_hub','=','cordinateur.hub_id')->withCount('fichecolis')->where('id_fiche','=',$idfiche)->first();


/*
$total = 0 ;

$val = (float)$dataPrice['0'] ;
dd($val);
for($i = 0 ; $i < $DataFiheInfos['fichecolis_count'] ; $i++){

$total = $total + intval(number_format($dataPrice[$i], 2, '.', ''))  ;


}
*/



    $pdf = PDF::loadView('dashboard.pages.ondelivery.fiche_all_pdf',  [ 'data' => $DataFiheInfos,'colis'=>$dataFicheColis]
  );  
  
    return $pdf->stream('feuillederoute.pdf');



}


}
