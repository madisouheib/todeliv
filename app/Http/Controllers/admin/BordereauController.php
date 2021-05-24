<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bordereau;


class BordereauController extends Controller
{

  public function index(){


 
        return view('dashboard.pages.bordereau.table_bord');


  }
  public function data_bord(){

    $DataCard = Bordereau::find('1');

    return response()->json($DataCard);


  }

  public function update_bord(Request $request){

    $brand     =  $request->input('brand');
    $mycolor   =  $request->input('colors');

    $notes     =  $request->input('notes');
    $phone     =  $request->input('phone');
    $adresse   =  $request->input('adresse');





 


    if($request->file()) {
        $avatar   = $request->file;
        $file_name = time().'_'.$request->file->getClientOriginalName();
       // $file_path = $request->file('file')->storeAs('/uploads/brand/',$file_name, 'public');
        $avatar->move('uploads/brand/',$file_name);

       // $namefile  = time().'_'.$request->file->getClientOriginalName();
        $pathfile =     '/uploads/brand/'.$file_name;

        $Bord = Bordereau::find('1');
        $Bord->logo =  $pathfile ;
        $Bord->save();
    }

    Bordereau::where('id', 1)
    ->update(['notes' => $notes ,'colors' => $mycolor,'brand'=> $brand ,'phone' => $phone ,'adresse'=> $adresse]);
    
  }


}
