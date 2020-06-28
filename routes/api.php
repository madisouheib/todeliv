<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





//wilaya routes : 
Route::get('/wilaya', 'admin\WilayaController@wilaya_data');
Route::post('/addwilaya', 'admin\WilayaController@wilaya_add');
Route::get('/showilaya/{id}', 'admin\WilayaController@wilaya_show');
Route::patch('/editwilaya/{id}', 'admin\WilayaController@wilaya_edit');
Route::delete('/deletewilaya/{id}', 'admin\WilayaController@wilaya_delete');

//Hubs routes : 

Route::get('/hub', 'admin\HubsController@hub_data');
Route::get('/huball', 'admin\HubsController@hub_all');
Route::post('/addhub', 'admin\HubsController@hub_add');
Route::get('/showhub/{id}', 'admin\HubsController@hub_show');
Route::patch('/edithub/{id}', 'admin\HubsController@hub_edit');
Route::delete('/deletehub/{id}', 'admin\HubsController@hub_delete');
Route::get('/getwilayas', 'admin\WilayaController@wilaya_tags');
Route::get('/getallwilayas', 'admin\WilayaController@wilaya_hub');
Route::get('/GetSelectedWilaya/{id}', 'admin\HubsController@wilaya_hub_selected');


//Profiles and permissions routes 

Route::get('/getprofiles', 'admin\ProfilesController@data_profiles');
Route::post('/addroles', 'admin\ProfilesController@add_roles');
Route::post('/delrole/{id}', 'admin\ProfilesController@del_roles');
Route::get('/getpermission', 'admin\ProfilesController@data_permission');
Route::post('/addpermission', 'admin\ProfilesController@add_permission');
Route::patch('/editpermission/{id}', 'admin\ProfilesController@permission_edit');
Route::delete('/deletepermission/{id}', 'admin\ProfilesController@delete_permission');

Route::get('/showpermission/{id}', 'admin\ProfilesController@permission_show');

// users section operation 
Route::get('/users', 'admin\UsersController@users_data');
Route::post('/adduser', 'admin\UsersController@store');

Route::get('/fetchuser/{id}', 'admin\UsersController@users_data_fetched');

Route::get('/getuser/{id}', 'admin\UsersController@show_user');


Route::post('/addcom', 'admin\CommandesController@add_com');


//colis 


Route::get('/getcolis/{id}', 'admin\ColisController@data_colis');

Route::get('/getcoms/{id}', 'admin\CommandesController@data_coms');

Route::get('/getColisinfos/{id}', 'admin\ColisController@infos_colis');

Route::post('/addcolis', 'admin\ColisController@add_colis');



Route::delete('/deletecolis/{id}', 'admin\ColisController@colis_delete');

Route::get('/getmanifs', 'admin\CommandesController@data_manifs');
Route::patch('/validatemanif/{id}', 'admin\CommandesController@validate_manif');



Route::get('/getclientpro', 'admin\UsersController@data_client_pro');
