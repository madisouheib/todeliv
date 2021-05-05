<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ColisImport;
use App\Exports\ColisExport;
use App\Exports\InhouseExport;
use App\Exports\DeliveryExport;
use App\Exports\OnDeliveryExport;
use App\Exports\ColisExportDelivered;
use App\Exports\FailedColisExport;
use App\Exports\RecpExport;
use App\Exports\RetourExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Colis;
use App\Commandes;
use App\User;
use App\StatsColis;
use Illuminate\Support\Facades\Auth;
use PDF;
use Carbon\Carbon;
class ColisController extends Controller
{
 

    public function upload_colis(){


        return view('dashboard.pages.client.commandes.commandes_create');
    }




    public function import(Request $request) 
    {

        $data=$request->input('idcoms');

        if(isset($data)){

            $data = $request->input('idcoms');
            Excel::import(new ColisImport($data),$request->file('colis'));
            return redirect('/admin/listcolis/'.$data)->with('success', 'All good!');
        }else {


            $request->validate([
                'colis'=> 'required' 
    
                ]);
    
                $idclient = Auth::id();
                $idhub = Auth::user()->hub_id;
            
             $data = '';
              $import = new ColisImport($data) ; 
              Excel::import($import,$request->file('colis'));
   
              if(  $import->getRowCount() == 1 ){

                return redirect('/admin/listcolis/'.$import->getComs())->with('success', 'All good!');
              }else {
            
              return  redirect('/admin/addcoms')->with('danger', ' votre fichier excel est vide ! ');
        }
    }

       

      
    }

    public function list_colis(){


        return view('dashboard.pages.client.colis.colis_table');

    }






    public function colis_delete($id){

        $delColis  = Colis::find($id);
        $delColis->delete();

    }
    






    public function export_livred() 
    {

      return Excel::download(new ColisExportDelivered(), 'export_colis_livre.xlsx');

    }

    public function export_recp($id) 
    {
    return Excel::download(new RecpExport($id), 'export_colis_commandes.xlsx');
    }
    public function export_in_house() 
    {
    return Excel::download(new InhouseExport(), 'export_colis_inhouse.xlsx');
    }
    public function export_deliv($id)
    {
    return Excel::download(new DeliveryExport($id), '_'.$id.'_export_colis_en_livraison.xlsx');
    }
    public function export_on_deliv($id)
    {
    return Excel::download(new OnDeliveryExport($id), '_'.$id.'_export_colis_F_route.xlsx');
    }
    public function export_retour(){

    return Excel::download(new RetourExport(), 'export_colis_retour.xlsx');
        
    } 
    public function export_failed(){

        return Excel::download(new FailedColisExport(), 'export_colis_echec.xlsx');
            
        } 

    public function data_colis($id){
if($id == 'all' ){
    $Colis = Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->where('id_clt','=',$id)->where('confirmed','=',null)->orderBy('id_colis', 'desc')->paginate(8);


}else {

    $Colis = Colis::leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->where('id_com','=',$id)->orderBy('id_colis', 'desc')->paginate(8);

}
      

 
        return response()->json($Colis);
    }






//____________________ Start section of validation ********

    public function data_colis_validation($idcom){


        
            $Colis = Colis::select('commandes.*', 'colis.*','users.name')->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->leftJoin('users', 'users.id', '=', 'commandes.id_clt')->where('id_com','=',$idcom)->orderBy('colis.updated_at', 'desc')->paginate(60);
        
    
            
        
         
                return response()->json($Colis);
            }

//____________________ END  section of validation ********







    public function infos_colis($id){

        $infosColis = Colis::find($id);

        return response()->json($infosColis);

    }
    public function add_colis(Request $request){



        $iduser   =  $request->input('iduser');

$User = User::find($iduser);

$hub = $User['hub_id'];



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
                         'id_hub'=> $hub ,
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
//code a barre cvalidation vien input controller 
public function data_colis_inhouse($id){


    $CheckLogin = User::select('roles.name as guard','users.hub_id as hub')
    ->leftJoin('model_has_roles','model_has_roles.model_id','=','users.id')
    ->leftJoin('roles','roles.id','=','model_has_roles.role_id')->where('users.id','=',$id)->first();
    
    //dd($CheckLogin['guard']);
    if($CheckLogin['guard'] == 'admin'){ 
        $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('validation','=',true)
        ->where(function ($query) {
            $query->where('colis.id_stats', '=', null)
                  ->orWhere('colis.id_stats', '=', 11);
        })
        ->orderBy('id_colis', 'desc')
        ->paginate(80);


    }else {


        $Colis = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('validation','=',true)
        ->where(function ($query) {
            $query->where('colis.id_stats', '=', null)
                  ->orWhere('colis.id_stats', '=', 11);
        })
        ->where('colis.id_hub','=',$CheckLogin['hub'])
        ->orderBy('id_colis', 'desc')
        ->paginate(80);



    }

   

    return response()->json($Colis);


}


    public function tmp_colis_validate(Request $request){
        $id = request('id');
       
        $tmpColis = Colis::find($id);
        $idcom = $tmpColis['id_com'];

            $tmpColis->tmp_validation = true;
            $tmpColis->tmp_signaler = false;
            $tmpColis->signaler = false;
            $tmpColis->save();

            $Colis = Colis::select('commandes.*', 'colis.*','users.name')->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->leftJoin('users', 'users.id', '=', 'commandes.id_clt')->where('id_com','=',$idcom)->orderBy('colis.updated_at', 'desc')->paginate(60);
        
    
            
        
         
            return response()->json($Colis);
       
        

    }
///getcoli all without any action --------------

    public function data_colis_recp($idcom){

        
        $Colis = Colis::select('commandes.*', 'colis.*','users.name')->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->leftJoin('users', 'users.id', '=', 'commandes.id_clt')->where('id_com','=',$idcom)->orderBy('colis.updated_at', 'desc')->paginate(60);
        
    
            
        
         
        return response()->json($Colis);


    }

    public function tmp_colis_signaler(Request $request){

$id = request('id');
        $tmpColis = Colis::find($id);
        $idcom = $tmpColis['id_com'];
        $CountTmp = Colis::where('id_colis','=',$id)->whereNull('tmp_signaler')->count();

        if( $CountTmp == 0  )
        {

            $tmpColis->tmp_signaler = true;
            $tmpColis->tmp_validation = false;
            $tmpColis->validation = false;
 
            $tmpColis->save();

        }

        $Colis = Colis::select('commandes.*', 'colis.*','users.name')->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')->leftJoin('users', 'users.id', '=', 'commandes.id_clt')->where('id_com','=',$idcom)->orderBy('colis.updated_at', 'desc')->paginate(60);
        
    
            
        
         
        return response()->json($Colis);


    }

   


    


    public function cash_by_one(Request $request){

        $id = request('id');
        $iduser = request('iduser');
      
        $CashByGp = Colis::find($id);
        $CashByGp->id_stats = 12;
        $CashByGp->save();


        StatsColis::create([
        'id_colis' => $id ,
        'id_stats'        => 12 ,
        'by_id_user'     =>  $iduser 
    
         ]);



}

public function update_all_livre(Request $request){

    $idliv = request('idliv');
    $byuser = request('userid');



if($idliv == null ){

    $GetIdColis =   Colis::where('colis.id_stats','=',4)->pluck('colis.id_colis')->toArray();

    Colis::where('colis.id_stats','=',4)->update(['id_stats' => 12]);
$count = count($GetIdColis);

for($i=0 ; $i < $count ;$i++ ){

    $add =   StatsColis::create([
        'id_stats' =>  12,
        'id_colis' =>  $GetIdColis[$i],
        'by_id_user' =>  $byuser
    ]);


}

}else {


  $GetIdColis =   Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')->where('fiche.id_liv','=',$idliv)->where('colis.id_stats','=',4)->pluck('colis.id_colis')->toArray();

  $count = count($GetIdColis);

    Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')->where('fiche.id_liv','=',$idliv)->where('colis.id_stats','=',4)->update(['id_stats' => 12]);

    for($i=0 ; $i < $count ;$i++ ){

      $add =   StatsColis::create([
            'id_stats' =>  12,
            'id_colis' =>  $GetIdColis[$i],
            'by_id_user' =>  $byuser
        ]);


    }

}








}

    //// Validation groupé colis  reception part ::::::::::::::::::::::::: // 


public function validate_colis_gp(){

    $id = request('id');

    $FinaleValidationColis = Colis::where('id_com', '=', $id)->where('tmp_validation', '=', true)->update(['validation' => true  ,'tmp_signaler'=> false,'signaler'=> false ]);
    $FinaleValidationC = Colis::where('id_com', '=', $id)->where('tmp_validation', '=', false)->update(['validation' => false  ,'tmp_signaler'=> true,'signaler'=> true ]);

     
         


}

//____________________ Start section of signal ********


public function signaler_colis_gp(){

    $id = request('id');

    $FinaleSignalColis = Colis::where('id_com', '=', $id)->where('tmp_signaler', '=', true)->update(['signaler'=> true ,'tmp_validation'=> false , 'validation'=> false ]);

     
    


}
public function colis_signaler(){

    $id = request('id');

    $FinalByOneColis = Colis::where('id_colis', '=', $id)->update(['signaler'=> true ,'tmp_validation'=> false , 'validation'=> false,'tmp_signaler'=>true ]);


}
public function colis_valider(){

    $id = request('id');

    $FinalByOneColis = Colis::where('id_colis', '=', $id)->update(['validation'=> true ,'tmp_signaler'=> false , 'signaler'=> false,'tmp_validation'=>true ]);



}

public function data_clients(){


    $FetchClients = User::select('users.*')->leftJoin('model_has_roles','model_has_roles.model_id','=','users.id')->where('model_has_roles.role_id', '=',19)->get();

    return response()->json($FetchClients);

}





 }
