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
use App\Bordereau;
use App\HubWilaya;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Commandes;
use App\Communs;
use App\User;
use App\StatsColis;
use App\Wilaya;
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

            $idcom = $request->input('idcoms');
            $data = Commandes::find($idcom);

            $data['idcom'] = $data->id_coms;
            $data['user'] = $data->id_clt;
            $data['stopdesk'] = $data->stopdesk;
            Excel::import(new ColisImport($data),$request->file('colis'));
            return redirect('/admin/listcolis/'.$idcom)->with('success', 'All good!');
        }else {
     
            $idclient = Auth::id();
            $idhub = Auth::user()->hub_id;
            $idcom =   Commandes::create(['id_clt'=> $idclient , 'id_hub'=>  $idhub  ])->id_coms;
       
            $request->validate([
                'colis'=> 'required' 
    
                ]);
    
              $data['idcom'] = $idcom;
              $data['user'] = $idclient;
              $data['stopdesk'] = 0;
              $import = new ColisImport($data) ; 
              Excel::import(new ColisImport($data),$request->file('colis'));
   
              

                return redirect('/admin/listcolis/'.$idcom)->with('success', 'All good!');
          
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


        
            $Colis = Colis::select('commandes.*', 'colis.*','users.name')
            ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
            ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
            ->where('id_com','=',$idcom)
            ->orderBy('colis.updated_at', 'desc')
            ->paginate(60);
        
    
            
        
         
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

        $produit  =  $request->input('produit');
        $price    =  $request->input('price');
        $livraiosn = $request->input('livraison');
        $idcom    =  $request->input('idcom');
        $GetPrice =   HubWilaya::where('id_wilaya','=',$wilaya)
        ->where('id_hub','=',$hub)
        ->first();
        $FreeShipping = $request->input('free');
        if($FreeShipping == true){
   
             $Price = '';

        }else {
            if($livraiosn == true){

                $Price = $GetPrice['stopdesk'] ; 
            }else {

                $Price = $GetPrice['price_home'] ; 

            }

       
        }
       
        $remarque   =  $request->input('remarque');

       $Fetch_wilaya = Wilaya::where('mat_wilaya',$wilaya)->first();
       $Fetch_commune = Communs::where('code_postal',$commune)->first();
       $name_wilaya = $Fetch_wilaya['nom_wilaya'];
       $name_commune = $Fetch_commune['nom'];
       Colis::create(['nom_client' => $name ,
                         'tel'=> $phone ,
                         'wilaya'=> $name_wilaya ,
                         'price'=> $price ,
                         'produit'=> $produit ,
                         'id_com'=> $idcom ,
                         'qte'=> $qte ,
                         'comun_id'=>$commune,
                         'wilaya_id'=> $wilaya,
                         'adress'=> $adresse,
                         'commune'=> $name_commune ,
                         'id_hub'=> $hub ,
                         'shipping_price' => $Price,
                         'remarque'=>$remarque,
                         'stopdesk'=>$livraiosn
                          ]);

                          return true ;

    }
    public function view_pdf($id){

        $data = Colis::leftJoin('commandes','colis.id_com','=','commandes.id_coms')
        ->join('users','users.id','=','commandes.id_clt')
        ->where('id_colis','=',$id)
        ->first()
        ->toArray();
        //dd($data);
        // This  $data array will be passed to our PDF blade
  
        $pdf = PDF::loadView('dashboard.pages.client.view_colis_pdf', $data);  

        return $pdf->stream('medium.pdf');

    }
    public function view_pdf_commandes($id){

        $data = Colis::select('commandes.*','colis.*','users.name as name','users.phone as phone','users.adresse as adresse')
        ->join('commandes','commandes.id_coms','=','colis.id_com')
        ->join('users','users.id','=','commandes.id_clt')
        ->where('id_coms','=',$id)
        ->get();
        $wilayas = Wilaya::all();
        //dd($data);
       
        $Bordereau = Bordereau::find('1');
        $pdf = PDF::loadView('dashboard.pages.client.view_all_colis_pdf',['data' => $data,'wilayas' => $wilayas,'brand' => $Bordereau]);  

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

            $Colis = Colis::select('commandes.*', 'colis.*','users.name')
            ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
            ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
            ->where('id_com','=',$idcom)
            ->orderBy('colis.updated_at', 'desc')
            ->paginate(60);
        
    
            
        
         
            return response()->json($Colis);
       
        

    }
///getcoli all without any action --------------

    public function data_colis_recp($idcom){

        
        $Colis = Colis::select('commandes.*', 'colis.*','users.name')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->where('id_com','=',$idcom)
        ->orderBy('colis.updated_at', 'desc')
        ->paginate(60);
        
    
            
        
         
        return response()->json($Colis);


    }

    public function tmp_colis_signaler(Request $request){

        $id = request('id');
        $tmpColis = Colis::find($id);
        $idcom = $tmpColis['id_com'];
        $CountTmp = Colis::where('id_colis','=',$id)
        ->whereNull('tmp_signaler')
        ->count();

        if( $CountTmp == 0  )
        {

            $tmpColis->tmp_signaler = true;
            $tmpColis->tmp_validation = false;
            $tmpColis->validation = false;
 
            $tmpColis->save();

        }

        $Colis = Colis::select('commandes.*', 'colis.*','users.name')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->where('id_com','=',$idcom)
        ->orderBy('colis.updated_at', 'desc')
        ->paginate(60);
        
    
            
        
         
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

    $GetIdColis =   Colis::where('colis.id_stats','=',4)
    ->pluck('colis.id_colis')
    ->toArray();

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


  $GetIdColis =   Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
  ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
  ->where('fiche.id_liv','=',$idliv)
  ->where('colis.id_stats','=',4)
  ->pluck('colis.id_colis')
  ->toArray();

  $count = count($GetIdColis);

    Colis::leftJoin('fiche_fields','fiche_fields.id_colis','=','colis.id_colis')
    ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
    ->where('fiche.id_liv','=',$idliv)
    ->where('colis.id_stats','=',4)
    ->update(['id_stats' => 12]);

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


    $FetchClients = User::select('users.*')
    ->leftJoin('model_has_roles','model_has_roles.model_id','=','users.id')
    ->where('model_has_roles.role_id', '=',19)
    ->get();

    return response()->json($FetchClients);

}
public function fix_colis_wilaya(Request $request){

    $name_wilaya  = $request->input('namewilaya');
    $id  = $request->input('idcolis');

   $wilaya =  Wilaya::where('mat_wilaya','=',$name_wilaya)->first();

    if(!empty($name_wilaya)){

        $colis_infos = Colis::find($id);
      
        $GetPrice =   HubWilaya::where('id_wilaya','=',$wilaya['mat_wilaya'])
        ->where('id_hub','=',$colis_infos->id_hub)
        ->first();
    if(count($GetPrice) > 0) {

        $Colis = Colis::find($id);
        $Colis->wilaya = $wilaya['nom_wilaya'];
        $Colis->shipping_price = $GetPrice['price_home'];
        $Colis->wilaya_id = $wilaya['mat_wilaya'];

    
        $Colis->save();
        }
    }



}




 }
