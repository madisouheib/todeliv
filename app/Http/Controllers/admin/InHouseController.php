<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Colis;
use App\User;
class InHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.inhouse.inhouse_table');
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
    public function wilaya_tags()
    {
   
$DataWilayas = Colis::where('validation','=',true)->where(function ($query) {
    $query->where('id_stats','=',null)
    ->orWhere('id_stats','=',11);
})->groupBy('wilaya')->pluck('wilaya')->toArray();

//dd($DataWilayas);

return response()->json($DataWilayas);

    }


public function data_filtre_client ($clt,$id){
  
    $CheckLogin = User::select('roles.name as guard','users.hub_id as hub')
    ->leftJoin('model_has_roles','model_has_roles.model_id','=','users.id')
    ->leftJoin('roles','roles.id','=','model_has_roles.role_id')->where('users.id','=',$id)->first();
    
    //dd($CheckLogin['guard']);
    if($CheckLogin['guard'] == 'admin'){ 
    $Colis = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')
    ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->where('commandes.id_clt','=',$clt)
    ->where('validation','=',true)
    ->where(function ($query) {
        $query->where('id_stats','=',null)
        ->orWhere('id_stats','=',11);
    })
    ->orderBy('id_colis', 'desc')->paginate(80);

    return response()->json($Colis);
    }else {

        $Colis = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('commandes.id_clt','=',$clt)
        ->where('validation','=',true)
        ->where('colis.id_hub','=',$CheckLogin['hub'])
        ->where(function ($query) {
            $query->where('id_stats','=',null)
            ->orWhere('id_stats','=',11);
        })
        ->orderBy('id_colis', 'desc')->paginate(80);
    
        return response()->json($Colis);


    }


}

public function data_filtre_codebars($code,$id){

    $CheckLogin = User::select('roles.name as guard','users.hub_id as hub')
    ->leftJoin('model_has_roles','model_has_roles.model_id','=','users.id')
    ->leftJoin('roles','roles.id','=','model_has_roles.role_id')->where('users.id','=',$id)->first();
    
    //dd($CheckLogin['guard']);
    if($CheckLogin['guard'] == 'admin'){ 

    $Colis = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')
    ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
    ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
    ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
    ->where('colis.id_colis','=',$code)
    ->where('validation','=',true)
    ->where(function ($query) {
        $query->where('id_stats','=',null)
        ->orWhere('id_stats','=',11);
    })
    ->orderBy('id_colis', 'desc')->paginate(80);

    return response()->json($Colis);

    }else {

        $Colis = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('colis.id_colis','=',$code)
        ->where('colis.id_hub','=',$CheckLogin['hub'])
        ->where('validation','=',true)
        ->where(function ($query) {
            $query->where('id_stats','=',null)
            ->orWhere('id_stats','=',11);
        })
        ->orderBy('id_colis', 'desc')->paginate(80);
    
        return response()->json($Colis);



    }

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function data_tentatives($tent,$id)
    {
     

        $CheckLogin = User::select('roles.name as guard','users.hub_id as hub')
        ->leftJoin('model_has_roles','model_has_roles.model_id','=','users.id')
        ->leftJoin('roles','roles.id','=','model_has_roles.role_id')->where('users.id','=',$id)->first();
        
        //dd($CheckLogin['guard']);
        if($CheckLogin['guard'] == 'admin'){ 


        $Colis = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')->WithCount('stats')
        ->having('stats_count','=', $tent)
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('validation','=',true)
        ->where(function ($query) {
            $query->where('id_stats','=',null)
            ->orWhere('id_stats','=',11);
        })
        ->orderBy('id_colis', 'desc')->paginate(80);
    
        return response()->json($Colis);
        }else{

        $Colis = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')
        ->WithCount('stats')
        ->having('stats_count','=', $tent)
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('validation','=',true)
        ->where('colis.id_hub','=',$CheckLogin['hub'])
        ->where(function ($query) {
            $query->where('id_stats','=',null)
            ->orWhere('id_stats','=',11);
        })
        ->orderBy('id_colis', 'desc')->paginate(80);
    
        return response()->json($Colis);

    }

       


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function data_filtre_wils($wil,$id)
    {
    


        $CheckLogin = User::select('roles.name as guard','users.hub_id as hub')
        ->leftJoin('model_has_roles','model_has_roles.model_id','=','users.id')
        ->leftJoin('roles','roles.id','=','model_has_roles.role_id')
        ->where('users.id','=',$id)->first();
        
        //dd($CheckLogin['guard']);
        if($CheckLogin['guard'] == 'admin'){ 


        $Colis = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('colis.wilaya','like','%'.$wil.'%')
        ->where('validation','=',true)
        ->where(function ($query) {
            $query->where('id_stats','=',null)
            ->orWhere('id_stats','=',11);
        })
        ->orderBy('id_colis', 'desc')->paginate(80);
    
        return response()->json($Colis);

    }else{

        $Colis = Colis::select('commandes.id_clt', 'colis.*','users.name','hubs.nom_hub')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('colis.wilaya','like','%'.$wil.'%')
        ->where('validation','=',true)
        ->where('colis.id_hub','=',$CheckLogin['hub'])
        ->where(function ($query) {
            $query->where('id_stats','=',null)
            ->orWhere('id_stats','=',11);
        })
        ->orderBy('id_colis', 'desc')->paginate(80);
    
        return response()->json($Colis);


    }
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
