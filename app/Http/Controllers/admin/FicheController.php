<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fiche;
use App\User;
use Illuminate\Support\Facades\DB;
class FicheController extends Controller
{




public function data_fiche(){


$DataFiche =  Fiche::select('fiche.*','livreur.name as livreur','cordinateur.name as cordinateur')->leftJoin('users as livreur','livreur.id','=','fiche.id_liv')->leftJoin('users as cordinateur','cordinateur.id','=','fiche.id_cord')->withCount(['price as prices' => function($query) {
    $query->select(DB::raw('sum(price)'));
},'fichecolis'])->where('cloture','=',0)->orderBy('id_fiche', 'DESC')->paginate(8);

return response()->json($DataFiche);



}


public function  data_fiche_filtre($id){


    if($id == 1 ){

        $DataFiche =  Fiche::select('fiche.*','livreur.name as livreur','cordinateur.name as cordinateur')->leftJoin('users as livreur','livreur.id','=','fiche.id_liv')->leftJoin('users as cordinateur','cordinateur.id','=','fiche.id_cord')->withCount(['price as prices' => function($query) {
            $query->select(DB::raw('sum(price)'));
        },'fichecolis'])->where('cloture','=',0)->where('valid_fiche','=',1)->orderBy('id_fiche', 'DESC')->paginate(8);

    }elseif($id == 2 ){


        $DataFiche =  Fiche::select('fiche.*','livreur.name as livreur','cordinateur.name as cordinateur')->leftJoin('users as livreur','livreur.id','=','fiche.id_liv')->leftJoin('users as cordinateur','cordinateur.id','=','fiche.id_cord')->withCount(['price as prices' => function($query) {
            $query->select(DB::raw('sum(price)'));
        },'fichecolis'])->where('cloture','=',0)->where('valid_fiche','=',0)->orderBy('id_fiche', 'DESC')->paginate(8);


    }else {

        $DataFiche =  Fiche::select('fiche.*','livreur.name as livreur','cordinateur.name as cordinateur')->leftJoin('users as livreur','livreur.id','=','fiche.id_liv')->leftJoin('users as cordinateur','cordinateur.id','=','fiche.id_cord')->withCount(['price as prices' => function($query) {
            $query->select(DB::raw('sum(price)'));
        },'fichecolis'])->where('cloture','=',1)->where('valid_fiche','=',1)->orderBy('id_fiche', 'DESC')->paginate(8);


    }


    
    return response()->json($DataFiche);

}


public function data_livreur(){


    $Liv  =  User::select('users.name','users.id')->leftJoin('model_has_roles','model_has_roles.model_id','=','users.id')->where('model_has_roles.role_id', '=',21)->get();

    return response()->json($Liv);
}


public function get_last_id(){

$GetLastID = Fiche::latest()->pluck('id_fiche')->first();

return response()->json($GetLastID);


}

public function add_fiche(Request $request){

    $idliv = request('idliv');
    $idcord = request('idcord');
    $notice = request('notice');
    $name = request('name');



    Fiche::create(['id_liv' => $idliv ,
    'id_cord'=> $idcord ,
    'ntoice'=> $notice ,
    'nom_fiche'=> $name
  
     ]);




}

public function valid_fiche(Request $request){
    $idfiche = request('idfiche');
    $EditFiche = Fiche::find($idfiche);
    $EditFiche->valid_fiche = true;
  
    $EditFiche->save();


}

public function invalid_fiche(Request $request){

    $idfiche = request('idfiche');
    $EditFiche = Fiche::find($idfiche);
    $EditFiche->valid_fiche = false;
  
    $EditFiche->save();



}



}
