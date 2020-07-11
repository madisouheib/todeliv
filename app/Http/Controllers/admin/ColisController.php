<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ColisImport;
use App\Exports\ColisExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Colis;
use App\Commandes;
use Illuminate\Support\Facades\Auth;
use PDF;
class ColisController extends Controller
{
 

    public function upload_colis(){


        return view('dashboard.pages.client.commandes.commandes_create');
    }




    public function import(Request $request) 
    {

        $data=$request->input('idcoms');

        if(isset($data)){

            $data=$request->input('idcoms');

        }else {


            $request->validate([
                'colis'=> 'required' 
    
                ]);
    
                $idclient = Auth::id();
              $data =   Commandes::create(['id_clt'=> $idclient ])->id_coms;
             
           
            

        }
       

        Excel::import(new ColisImport($data),$request->file('colis'));

        return redirect('/admin/listcolis/'.$data)->with('success', 'All good!');
    }

    public function list_colis(){


        return view('dashboard.pages.client.colis.colis_table');

    }






    public function colis_delete($id){

        $delColis  = Colis::find($id);
        $delColis->delete();

    }
    






    public function export($id) 
    {

     
        return Excel::download(new ColisExport($id), 'export_colis.xlsx');
    }



    public function data_colis($id){
if($id == 'all' ){
    $Colis = Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->where('id_clt','=',$id)->where('confirmed','=',null)->orderBy('id_colis', 'desc')->paginate(8);


}else {

    $Colis = Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->where('id_com','=',$id)->orderBy('id_colis', 'desc')->paginate(8);

}
      

 
        return response()->json($Colis);
    }

    public function infos_colis($id){

        $infosColis = Colis::find($id);

        return response()->json($infosColis);

    }
    public function add_colis(Request $request){




        $phone   =  $request->input('phone');
        $name    =  $request->input('name');
        $wilaya  =  $request->input('wilaya');
        $qte     =  $request->input('qte');
        $adresse =  $request->input('adresse');
        $commune =  $request->input('commune');
        $produit =  $request->input('produit');
        $price   =  $request->input('price');
        $idcom   =  $request->input('idcom');
        $remarque   =  $request->input('remarque');


    
      Colis::create(['nom_client' => $name ,
                         'tel'=> $phone ,
                         'wilaya'=> $wilaya ,
                         'price'=> $price ,
                         'produit'=> $produit ,
                         'id_com'=> $idcom ,
                         'qte'=> $qte ,
                         'adress'=> $adresse,
                         'commune'=> $commune ,
                         'remarque'=>$remarque
                          ]);

                          return true ;

    }
    public function view_pdf($id){

$data = Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->join('users', 'commandes.id_clt', '=', 'users.id')->where('id_colis','=',$id)->first()->toArray();
//dd($data);
 // This  $data array will be passed to our PDF blade

  
  $pdf = PDF::loadView('dashboard.pages.client.view_colis_pdf', $data);  

  return $pdf->stream('medium.pdf');

    }
    public function view_pdf_commandes($id){

        $data = Colis::join('commandes', 'colis.id_com', '=', 'commandes.id_coms')->join('users', 'commandes.id_clt', '=', 'users.id')->where('id_coms','=',$id)->get();
        //dd($data);
        $pdf = PDF::loadView('dashboard.pages.client.view_all_colis_pdf',[ 'data' => $data]);  

        return $pdf->stream('medium.pdf');
    }



 }
