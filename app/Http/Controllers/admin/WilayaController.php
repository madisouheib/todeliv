<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wilaya;
use App\Communs;
use App\User;
use App\HubWilaya;

class WilayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.hub.wilaya.wilaya_table');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function wilaya_add(Request $request)
                {
                  Wilaya::create($request->all());
                }




public function wilaya_data()
 {
    $wilaya = Wilaya::orderBy('id_wilaya', 'desc')->paginate(10);
    //dd($users);
    return response()->json($wilaya);


}

public function wilaya_hub()
 {
    $wilaya = Wilaya::orderBy('id_wilaya', 'desc')->get();
    //dd($users);
    return response()->json($wilaya);


}

public function wilaya_tags()
 {
    $wilaya = Wilaya::orderBy('id_wilaya', 'asc')->get();

    return response()->json($wilaya);


}

public function get_communes($id,$hub){


    $UserHub = User::find($hub);


    $communes = Communs::where('wilaya_id','=',$id)->get();
    $price =   HubWilaya::where('id_wilaya','=',$id)->where('id_hub','=',$UserHub->hub_id)->first();
    $data = array();
    $data['communes'] = $communes ;
    $data['price'] = $price;
    return response()->json($data);
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
    public function wilaya_edit(Request $request,$id)
    {
        
        $Editwilaya = Wilaya::find($id);
        $Editwilaya->nom_wilaya = request('name');
        $Editwilaya->mat_wilaya = request('mat');
        $Editwilaya->price_deliv = request('price');
        $Editwilaya->save();
        //dd($users);
   


    }

    public function wilaya_show($id)
    {
        
        $Showilaya = Wilaya::find($id);
        //dd($users);
        return response()->json($Showilaya);


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
    public function wilaya_delete($id)
    {
    $delwilaya  = Wilaya::find($id);
    if($delwilaya->delete()){


    }else {


 return response()->json(['error'=> 'ya un problem dans la suppression'],444);
    }
    }
}
