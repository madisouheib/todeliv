<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Accounting;
use App\AccountColis;
use App\Colis;
use PDF;
use Illuminate\Support\Facades\DB;
class AccountingController extends Controller
{

    public function data_account(){

$data = Accounting::select('users.*','accounting_fiche.*')->withCount(['total as prices' => function($query) {
    $query->select(DB::raw('sum(price)'));
},'retour as nodeliv' => function($query) {
    $query->select(DB::raw('sum(shipping_price)'));
},'livre as delivred' => function($query) {
    $query->select(DB::raw('sum(shipping_price)'));
},'totaldeliv as encaiss' => function($query) {
    $query->select(DB::raw('sum(shipping_price)'));
},'total'])->leftJoin('users','users.id','=','accounting_fiche.id_partner')
                    ->where('accounting_fiche.etat','=',0)
                    ->paginate('10');
  
        return response()->json($data);


    }


    public function create_invoice(Request $request){

        $idpart = request('idpart');
        $field = request('field');
  
    
    
    
        Accounting::create(['id_partner' => $idpart ,
        'field_account'=> $field 

      
         ]);

    }


    public function valid_invoice(Request $request){ 

        $idfact = request('idfacture');
        $UpdateFacture = Accounting::find($idfact);
        $UpdateFacture->etat = true;
      
        $UpdateFacture->save();


    }


    public function data_account_filtred($id){



        $data = Accounting::select('users.*','accounting_fiche.*')->withCount(['total as prices' => function($query) {
            $query->select(DB::raw('sum(price)'));
        },'retour as nodeliv' => function($query) {
            $query->select(DB::raw('sum(shipping_price)'));
        },'livre as delivred' => function($query) {
            $query->select(DB::raw('sum(shipping_price)'));
        },'totaldeliv as encaiss' => function($query) {
            $query->select(DB::raw('sum(shipping_price)'));
        }])->leftJoin('users','users.id','=','accounting_fiche.id_partner')
                            ->where('accounting_fiche.etat','=',0)
                            ->where('users.id','=',$id)
                            ->paginate('10');
          
                return response()->json($data);
                

    }


    public function data_account_etat($stats){

        $data = Accounting::select('users.*','accounting_fiche.*')->withCount(['total as prices' => function($query) {
            $query->select(DB::raw('sum(price)'));
        },'retour as nodeliv' => function($query) {
            $query->select(DB::raw('sum(shipping_price)'));
        },'livre as delivred' => function($query) {
            $query->select(DB::raw('sum(shipping_price)'));
        },'totaldeliv as encaiss' => function($query) {
            $query->select(DB::raw('sum(shipping_price)'));
        }])->leftJoin('users','users.id','=','accounting_fiche.id_partner')
                            ->where('accounting_fiche.etat','=',$stats)
                  
                            ->paginate('10');
          
                return response()->json($data);


    }


    public function data_compta_detail($id){
   
        $data = Accounting::select('colis.*')
        ->leftJoin('account_colis','account_colis.id_account','=','accounting_fiche.id_accounting')
        ->leftJoin('colis','colis.id_colis','=','account_colis.id_colis')
        ->where('accounting_fiche.id_accounting','=',$id)
        ->distinct('account_colis.id_colis')
        ->paginate('10');

        return response()->json($data);


    }


    public function compta_update_price(Request $request){


        $idcolis = request('idcolis');
        $newprice = request('newprice');
        $UpdatePrice = Colis::find($idcolis);
        $UpdatePrice->shipping_price = $newprice;
      
        $UpdatePrice->save();


    }

    public function facture_pdf($id){

    
$User = Accounting::select('users.*','accounting_fiche.*')->withCount(['total as prices' => function($query) {
    $query->select(DB::raw('sum(price)'));
},'retour as nodeliv' => function($query) {
    $query->select(DB::raw('sum(shipping_price)'));
},'livre as delivred' => function($query) {
    $query->select(DB::raw('sum(shipping_price)'));
},'totaldeliv as encaiss' => function($query) {
    $query->select(DB::raw('sum(shipping_price)'));
}])->leftJoin('users','users.id','=','accounting_fiche.id_partner')
->where('id_accounting','=',$id)
->first();

        $data = Accounting::select('colis.*')
        ->join('account_colis','account_colis.id_account','=','accounting_fiche.id_accounting')
        ->leftJoin('colis','colis.id_colis','=','account_colis.id_colis')
        ->where('accounting_fiche.id_accounting','=',$id)
        ->distinct('account_colis.id_colis')
        ->orderBy('colis.id_stats','ASC')
        ->get();






        $pdf = PDF::loadView('dashboard.pages.accounting.facture_pdf',[ 'data' => $data,'user' =>$User ]);  

        return $pdf->stream('medium.pdf');
        
    }
    public function part_data($id){
        $Parten = Accounting::where('accounting_fiche.id_partner','=',$id)
        ->leftJoin('users','users.id','=','accounting_fiche.id_partner')
        ->get();

        return response()->json($Parten);

    }


    public function udpate_prices(Request $request){



        $idaccount = request('idaccount');
        $data = request('data');
$Count = count($data);
       

        for($i= 0 ;$i < $Count ;$i++)
        {

            $ifExist = AccountColis::where('id_colis','=',$data[$i]['key'])->where('id_account','=',$idaccount)->count();

            if($ifExist == 0 ){


                $UpdatePrice = Colis::find($data[$i]['key']);
                $UpdatePrice->shipping_price = $data[$i]['price'];
              
                $UpdatePrice->save();
        
        
                    
            
            
                AccountColis::create(['id_colis' => $data[$i]['key'] ,
                'id_account'=> $idaccount
                 ]);
            }

     

        }

    }

}
