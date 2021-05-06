<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Commandes;
use App\Colis;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CommandesController extends Controller

{
    public function index(){
  
      


        return view('dashboard.pages.client.commandes.commandes_table');


    }


    public function archive_commandes(){

      return view('dashboard.pages.client.commandes.commandes_archive');

    }


    public function infos_coms($id){
      $Comas = commandes::find($id);
     
      return response()->json($Comas);

    }

public function manif_delete($id){

  $delComs  = commandes::find($id);
  $delComs->delete();


}



public function data_coms($id){

  $Comas = commandes::withCount(['price as prices' => function($query) {
    $query->select(DB::raw('sum(price)'));
},'colis'])->where('id_clt','=',$id)->orderBy('id_coms', 'desc')->paginate(10);


 
        return response()->json($Comas);


}


public function data_coms_archive($id){

  $Comas = commandes::withCount(['colis'])
  ->where([['id_clt','=',$id],['cloture','=',1]])
  ->orderBy('id_coms', 'desc')
  ->paginate(10);


 
        return response()->json($Comas);


}


public function data_manifs($id){

   // dd($id);
$CheckLogin = User::select('roles.name as guard','users.hub_id as hub')
->leftJoin('model_has_roles','model_has_roles.model_id','=','users.id')
->leftJoin('roles','roles.id','=','model_has_roles.role_id')
->where('users.id','=',$id)
->first();

//dd($CheckLogin['guard']);
if($CheckLogin['guard'] == 'admin'){


  $Comas = commandes::withCount(['price as prices' => function($query) {
    $query->select(DB::raw('sum(price)'));
}, 'colis','signaler','validate'])
->where([['cloture','=',null],['confirmed_user','=',1]])
->orderBy('id_coms', 'desc')
->paginate(40);



}else {



  $Comas = commandes::withCount(['price as prices' => function($query) {
    $query->select(DB::raw('sum(price)'));
}, 'colis','signaler','validate'])
->where('commandes.id_hub','=',$CheckLogin['hub'])
->where([['cloture','=',null],['confirmed_user','=',1]])
->orderBy('id_coms', 'desc')
->paginate(40);




}


        return response()->json($Comas);


}

public function filtre_client($code){
  
      $Comas = commandes::withCount(['price as prices' => function($query) {
        $query->select(DB::raw('sum(price)'));
    }, 'colis','signaler','validate'])
    ->where([['cloture','=',null],['confirmed_user','=',1],['id_clt','=',$code]])
    ->orderBy('id_coms', 'desc')
    ->paginate(40);



        return response()->json($Comas);




}

public function filtre_etat($code){

  $Comas = commandes::withCount(['price as prices' => function($query) {
    $query->select(DB::raw('sum(price)'));
}, 'colis','signaler','validate'])
->where([['cloture','=',null],['confirmed_user','=',1],['confirmed','=',$code]])
->orderBy('id_coms', 'desc')
->paginate(40);



        return response()->json($Comas);


}
public function data_manifs_archive(){


  $Comas = commandes::withCount('colis')
  ->where([['cloture','=',1],['confirmed_user','=',1]])
  ->orderBy('id_coms', 'desc')
  ->paginate(4);


  return response()->json($Comas);
}


public function validate_manif($id){

  $ValidateCommande = commandes::find($id);
        $ValidateCommande->confirmed = true;
        $ValidateCommande->save();

}

public function cloture_manif($id){

  $ClotureCommande = commandes::find($id);
        $ClotureCommande->cloture = true;
        $ClotureCommande->save();

}



public function validate_manif_user($id){

  $ValidateCommande = commandes::find($id);
        $ValidateCommande->confirmed_user = true;
        $ValidateCommande->save();

}



    public function add_com(Request $request){



        
    

       




    $nameCom =  $request->input('namecom');
    $idclient =  $request->input('idclient');

    $user = User::find($idclient);
    $idhub = $user->hub_id;
  Commandes::create(['nom_com' => $nameCom ,'id_clt'=> $idclient ,'id_hub' =>  $idhub ]);


  return redirect('admin/commandes');
 

    }


    public function getDownload()
    {
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/download/data_colis.xlsx";
    
     
    
        return response()->download($file, 'data_colis.xlsx');
    }




}
