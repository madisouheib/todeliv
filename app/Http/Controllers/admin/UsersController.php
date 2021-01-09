<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Users;
use App\User;

use App\UserProfiles;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.users.users_table');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user_delete($id)
    {
        $deluser  = User::find($id);
        $deluser->delete();



    }
        /**
     * Show the  users  axios from database.
     *

     */
    public function users_data()
    {


    $users = Users::select('users.*','roles.name as field_name')->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
    ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
    ->latest()
    ->paginate(10);

    return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $username = request('username');
$name = request('name');
$email = request('email');
$password= request('password');
$adresse= request('adresse');
$role = request('role');
$phone = request('phone');
$hub = request('hub');


       $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'full_name'=> $username,
            'adresse'=> $adresse,
            'phone'=> $phone,
            'hub_id'=> $hub
        ]);




        $user->assignRole($role);

    }
    public function data_client_pro(){


        $usersPro = Users::select('users.id','users.full_name')->rightJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')->rightJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')->where('roles.name','=','client pro')->get();

        return response()->json($usersPro);

    }

    public function users_data_fetched($id){

        $users = Users::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')->where('model_has_roles.role_id','=',$id)->paginate(6);
        //dd($users);
        return response()->json($users);


    }
public function show_user($id){

    $ShowUser = Users::select('users.*','model_has_roles.role_id','hubs.id_hub','hubs.nom_hub','roles.name as name_role')
    ->join('hubs', 'users.hub_id', '=', 'hubs.id_hub')
    ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
    ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
    ->where('users.id','=',$id)
    ->first();

    return response()->json($ShowUser);


}

//____--------- users ediiiiit section ::::::: 


public function edit_user(Request $request){

   



$id  = request('iduser');
    $EditUser = User::find($id);
    $EditUser->name = request('name');
    $EditUser->full_name = request('username');
    $EditUser->email = request('email');
    $EditUser->adresse = request('adresse');
    $EditUser->phone = request('phone');
    $EditUser->service_client = request('service_client');
    $EditUser->hub_id = request('hub');
    $EditUser->save();

$DataProfil = UserProfiles::where('model_id',$id)->update([
    'role_id' => request('role')
 ]);




}

// change password users 

public function edit_user_pass(Request $request){


    $id  = request('iduser');
    $passkey = request('passkey');
    $password = request('password') ;

    if($passkey == '1962'){

        $EditPass = User::find($id);
        $EditPass->password = Hash::make($password);
        $EditPass->save();

    }
 

}

public function show_user_delete($id){

    $ShowUser = Users::find($id);

    return response()->json($ShowUser);


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
