<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hub;
use App\Wilaya;
use App\HubWilaya;
class HubsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.hub.hub_table');
    }

    public function hub_show($id)
    {
        
        $ShowHub = Hub::join('wilaya', 'hubs.adresse', '=', 'wilaya.id_wilaya')->find($id);
        $Selectedwilaya = HubWilaya::join('wilaya', 'hub_wilaya.id_wilaya', '=', 'wilaya.id_wilaya')->where('hub_wilaya.id_hub','=',$id)->get(['wilaya.nom_wilaya AS name', 'wilaya.id_wilaya AS key' ])->toArray();
        //dd($users);
        $ShowHub['vals']  = $Selectedwilaya ;  
        return response()->json($ShowHub);


    }

    public function wilaya_hub_selected($id){
        
        $Selectedwilaya = HubWilaya::join('wilaya', 'hub_wilaya.id_wilaya', '=', 'wilaya.id_wilaya')->where('hub_wilaya.id_hub','=',$id)->get(['wilaya.nom_wilaya AS name', 'wilaya.id_wilaya AS key' ])->toArray();

        return response()->json($Selectedwilaya);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hub_data()
    {
       $hubs = Hub::withCount(['users','wilayas'])->orderBy('id_hub', 'desc')->paginate(4);
       //dd($users);
       return response()->json($hubs);
   
   
   }

   public function hub_all()
   {
      $hubs = Hub::all();
      //dd($users);
      return response()->json($hubs);
  
  
  }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hub_add(Request $request)
    {
       $wilayas =  $request->input('wilayas');
       $namehub =  $request->input('name_hub');
       $adresse =  $request->input('id_wilaya');
       

       $hubinserted = Hub::create([
        'nom_hub' => $namehub,
        'adresse' => $adresse ]);


       foreach($wilayas as $wils) { 


HubWilaya::create([
    'id_wilaya' => $wils['key'],
    'id_hub' => $hubinserted->id_hub,

]);


       }


       $hubs = Hub::withCount(['users','wilayas'])->orderBy('id_hub', 'desc')->paginate(4);
       //dd($users);
       return response()->json($hubs);

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

    public function wilaya_add(Request $request)
    {
 Hub::create($request->all());
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
