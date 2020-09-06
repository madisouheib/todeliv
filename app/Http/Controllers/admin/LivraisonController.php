<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fiche ;
use App\User ; 
use Illuminate\Support\Facades\DB;
class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.livraison.livraison_table');
    }
 public function list_livraison($id) {

//$Data= Fiche::where()
$DataFicheId = Fiche::whereNull('closed_at')->whereNotNull('valid_fiche')->where('fiche.id_liv','=',$id)->pluck('id_fiche')->toArray();

$NameUser = User::where('id','=',$id)->pluck('name')->first();

    return view('dashboard.pages.livraison.livraison_detail')->with('listfiche',$DataFicheId)->with('namelivreur',$NameUser);

 }



 public function data_fiche_delevery(){
    $DataUsers = Fiche::whereNull('closed_at')->whereNotNull('valid_fiche')->pluck('id_liv')->toArray();
    
    $DatauserUnique = array_unique($DataUsers);
    
    
    $DataLivr = User::withCount(['amount as prices' => function($query) {
        $query->select(DB::raw('sum(price)'));
    }],'fiche')->whereIn('id',$DatauserUnique)->paginate(10);
   
    return response()->json($DataLivr);
    
       } 


       public function data_livreur_delevery(){

        $DataUsers = Fiche::whereNull('closed_at')->where('valid_fiche','=',true)->pluck('id_liv')->toArray();
    
        $DatauserUnique = array_unique($DataUsers);

        
        $DataLivr = User::withCount(['montant as prix' => function($query) {
            $query->select(DB::raw('sum(price)'));
        }])->whereIn('id',$DatauserUnique)->paginate(10);
       
        //dd($DataLivr);
        return response()->json($DataLivr);




       }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
}
