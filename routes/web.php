<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// admin routes 
Route::group([ 'middleware'=>'auth'], function () {   

Route::get('/admin', 'admin\HomeAdminController@index')->name('index');

// admin routes Users  

Route::get('/admin/users', 'admin\UsersController@index')->name('index');

// admin routes Profiles   

Route::get('/admin/profiles', 'admin\ProfilesController@index')->name('index');
Route::get('/admin/permission', 'admin\ProfilesController@display_permission')->name('display_permission');

// admin routes wilaya   

Route::get('/admin/wilaya', 'admin\WilayaController@index')->name('index');

// admin routes Hubs   

Route::get('/admin/hub', 'admin\HubsController@index')->name('index');



// admin routes inhouse   ---------------------------------- 
Route::get('/admin/commandes', 'admin\CommandesController@index')->name('index');
Route::get('/admin/archoms', 'admin\CommandesController@archive_commandes')->name('archive_commandes');
Route::get('/admin/addcoms/{id}', 'admin\ColisController@upload_colis')->name('upload_colis');
Route::get('/admin/addcoms', 'admin\ColisController@upload_colis')->name('upload_colis');
Route::post('/admin/upload', 'admin\ColisController@import')->name('import');

Route::get('/admin/listcolis/{id}', 'admin\ColisController@list_colis')->name('list_colis');
// admin routes reception   


Route::get('/admin/rec', 'admin\ReceptionController@index')->name('index');
Route::get('/admin/addrecp', 'admin\ReceptionController@add_recp')->name('add_recp');



// admin routes transit  //  


Route::get('/admin/transitretour', 'admin\TransitController@transit_retour')->name('transit_retour');
Route::get('/admin/transitenvoie', 'admin\TransitController@transit_envoie')->name('transit_envoie');

Route::get('/admin/transit/{id}', 'admin\TransitController@detail')->name('detail');
Route::get('/admin/addtransit', 'admin\TransitController@add_transit')->name('add_transit');


// admin routes inhouse   ---------------------------------- 
Route::get('/admin/inhouse', 'admin\InHouseController@index')->name('index');


// admin routes  F-route   
Route::get('/admin/ondelivery', 'admin\OnDeliveryController@index')->name('index');
Route::get('/admin/listdelivery', 'admin\OnDeliveryController@list_delivery')->name('list_delivery');

// admin routes  Livraison    
Route::get('/admin/livraison', 'admin\LivraisonController@index')->name('index');
Route::get('/admin/listenliv', 'admin\LivraisonController@list_livraison')->name('list_livraison');

// admin routes  echouée    
Route::get('/admin/echlivraison', 'admin\FailedController@index')->name('index');



// admin routes  livré    
Route::get('/admin/livre', 'admin\ConfirmedController@index')->name('index');

// admin routes  routeurs    
Route::get('/admin/retours', 'admin\RetourController@index')->name('index');


//----- tracking id 


Route::get('/admin/tracking', 'TrackingController@index')->name('index');
Route::get('/admin/download', 'admin\CommandesController@getDownload')->name('getDownload');

Route::get('/admin/print-pdf/{id}','admin\ColisController@view_pdf')->name('view_pdf');
Route::get('/admin/export/{id}', 'admin\ColisController@export')->name('export');

});
