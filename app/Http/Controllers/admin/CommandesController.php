<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Commandes;
use App\Colis;
use Illuminate\Support\Facades\Auth;
class CommandesController extends Controller

{
    public function index(){
  
      


        return view('dashboard.pages.client.commandes.commandes_table');


    }
public function data_coms($id){

  $Comas = commandes::withCount(['colis'])->where('id_clt','=',$id)->orderBy('id_coms', 'desc')->paginate(4);


 
        return response()->json($Comas);


}

public function data_manifs(){

    
  $Comas = commandes::withCount('colis')->has('colis','>',0)->orderBy('id_coms', 'desc')->paginate(4);


 
        return response()->json($Comas);


}

public function validate_manif($id){

  $ValidateCommande = commandes::find($id);
        $ValidateCommande->confirmed = true;
        $ValidateCommande->save();

}



    public function add_com(Request $request){



        
    

       




    $nameCom =  $request->input('namecom');
    $idclient =  $request->input('idclient');


  Commandes::create(['nom_com' => $nameCom , 'id_clt'=> $idclient ]);


  return redirect('admin/commandes');
 

    }


    public function getDownload()
    {
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/download/data_colis.xlsx";
    
     
    
        return response()->download($file, 'data_colis.xlsx');
    }




}
