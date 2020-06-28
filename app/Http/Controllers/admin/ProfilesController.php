<?php

namespace App\Http\Controllers\admin;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use  App\Profiles;

class ProfilesController extends Controller
{
    protected $user;

/**
 * Create a new controller instance.
 *
 * @return void
 */
public function __construct()
{
    $this->middleware(function ($request, $next) {
        $this->user= Auth::user();

        return $next($request);
    });
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

   


        return view('dashboard.pages.groups.groups_table');
    }
    public function display_permission(){


        return view('dashboard.pages.groups.permission_table');
    }
public function data_profiles(){


    $all_roles_in_database = Role::all();

    return response()->json($all_roles_in_database);

}
public function data_permission(){

    $all_permission_in_database = Permission::orderBy('id', 'desc')->get();

    return response()->json($all_permission_in_database);
}
public function delete_permission($id){


    $delperm  = Permission::find($id);
    if($delperm->delete()){


    }else {


 return response()->json(['error'=> 'ya un problem dans la suppression'],444);
    }

}
public function add_permission(Request $request){



    $name =  $request->input('name');
    $guard =  $request->input('guard');

    $permission = Permission::create(['name' => $name , 'guard_name'=> $guard ]);

}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function add_roles(Request $request){ 

            $name = $request->input('name');
            $permissions = $request->input('permissions');

            $role = Role::create(['name' => $name]);
            $role = Role::findByName($request->input('name'));



            $role->givePermissionTo($permissions);
                //$id = $role = Role::create(['name' => 'writer']);
 


       


    }

    public function permission_edit(Request $request,$id){

        $EditPermission = Permission::find($id);
        $EditPermission->name = request('name');
        $EditPermission->guard_name = request('guard');
        $EditPermission->save();

        $permissions = Permission::all();

        return response()->json($permissions);
    }
    public function permission_show($id){

 
        $ShowPer = Permission::find($id);
        //dd($users);
        return response()->json($ShowPer);

    }

    public function del_roles($id){
        $delRole  = Role::find($id);
        $delRole->delete(); 



    }

  
    public function wi_show($id)
    {
        
        $ShowPer = Permission::find($id);
        //dd($users);
        return response()->json($ShowPer);


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
