<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wilaya;
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
    $wilaya = Wilaya::orderBy('id_wilaya', 'desc')->paginate(4);
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
    $wilaya = Wilaya::orderBy('id_wilaya', 'desc')->get(['wilaya.nom_wilaya AS name', 'wilaya.id_wilaya AS key' ])->toArray();

    return response()->json($wilaya);


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
    public function wilaya_delete($id)
    {
    $delwilaya  = Wilaya::find($id);
    if($delwilaya->delete()){


    }else {


 return response()->json(['error'=> 'ya un problem dans la suppression'],444);
    }
    }
}
