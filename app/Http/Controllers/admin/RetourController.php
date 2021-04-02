<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Colis ; 
use App\StatsColis ; 
class RetourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.return.return_table');
    }

 public function trasnfer_retour(Request $request,$id){


$Data = Colis::leftJoin('stats','stats.id_stats','=','colis.id_stats')->where('stats.order_stats','=',5)->pluck('colis.id_colis')->toArray();


$count = count($Data);

for($i= 0 ;$i < $count ;$i++)
{



    $UpdateColis = Colis::find($Data[$i]);
    $UpdateColis->id_stats = 3;
  
    $UpdateColis->save();


        


    StatsColis::create(['id_colis' => $Data[$i],
    'id_stats'=> 3,
    'by_id_user'=> $id
     ]);

}




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
