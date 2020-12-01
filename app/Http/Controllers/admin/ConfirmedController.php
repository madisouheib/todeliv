<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Colis ; 
class ConfirmedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.confirmed.confirmed_table');
    }

  
public function index_acounting(){


    return view('dashboard.pages.accounting.accounting_table');


}


public function index_facturation(){


       return view('dashboard.pages.accounting.facturation_table');

}


public function get_delivred_confirmed()
{
   


    $ColisData = Colis::select('commandes.*', 'colis.*','users.name','hubs.nom_hub')
    ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->where('validation','=',true)
    ->where(function ($query) {
        $query->where('id_stats', '=', 12)
              ->orWhere('id_stats', '=', 13);
    })
    ->orderBy('colis.id_colis', 'desc')->paginate(40);



    $TotalPrice =   Colis::
    where('validation','=',true)
    ->where('colis.id_stats','=',12)->sum('price'); 
    $PriceRetour =   Colis::
where('validation','=',true)
->where('colis.id_stats','=',13)->sum('price'); 

$Colis = array('colis'=> $ColisData , 'amount'=> $TotalPrice,'retour'=>$PriceRetour );








    return response()->json($Colis);

}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
