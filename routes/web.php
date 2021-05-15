<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// admin routes 
Route::group([ 'middleware'=>'auth'], function () {   

Route::get('/admin', 'admin\HomeAdminController@index')->name('index');
Route::get('/admin/data', 'admin\HomeAdminController@index')->name('data_stats');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
// admin routes Users  
Route::get('/admin/export/{id}', 'admin\ColisController@export_recp')->name('export_recp');
Route::get('/admin/users', 'admin\UsersController@index')->name('index');



Route::get('/admin/download', 'admin\CommandesController@getDownload')->name('getDownload');

Route::group(['middleware' => ['role:admin|livreur']], function () { 
    Route::get('/admin/deliver', 'admin\OnDeliveryController@view_livreur')->name('view_livreur');

});

Route::group(['middleware' => ['role:admin|coordinateur']], function () {
// admin routes Profiles   

Route::get('/admin/profiles', 'admin\ProfilesController@index')->name('index');
Route::get('/admin/permission', 'admin\ProfilesController@display_permission')->name('display_permission');

// admin routes wilaya   

Route::get('/admin/wilaya', 'admin\WilayaController@index')->name('index');

// admin routes Hubs   

Route::get('/admin/hub', 'admin\HubsController@index')->name('index');





// admin routes transit  //  


Route::get('/admin/transitretour', 'admin\TransitController@transit_retour')->name('transit_retour');
Route::get('/admin/transitenvoie', 'admin\TransitController@transit_envoie')->name('transit_envoie');

Route::get('/admin/transit/{id}', 'admin\TransitController@detail')->name('detail');

Route::get('/admin/transitrecp/{id}', 'admin\TransitController@detail_recp')->name('detail_recp');
Route::get('/admin/addtransit', 'admin\TransitController@add_transit')->name('add_transit');


// admin routes inhouse   ---------------------------------- 
Route::get('/admin/inhouse', 'admin\InHouseController@index')->name('index');


// admin routes  F-route   
Route::get('/admin/ondelivery', 'admin\OnDeliveryController@index')->name('index');
Route::get('/admin/listdelivery/{id}', 'admin\OnDeliveryController@list_delivery')->name('list_delivery');
Route::get('/admin/fichepdf/{idfiche}', 'admin\FicheColisController@pdf_all_fiche')->name('pdf_all_fiche');



// admin routes  Livraison    
Route::get('/admin/livraison', 'admin\LivraisonController@index')->name('index');
Route::get('/admin/listenliv/{id}', 'admin\LivraisonController@list_livraison')->name('list_livraison');

// admin routes  echouée    
Route::get('/admin/echlivraison', 'admin\FailedController@index')->name('index');



// admin routes  livré    
Route::get('/admin/livre', 'admin\ConfirmedController@index')->name('index');

// admin routes  routeurs    
Route::get('/admin/retours', 'admin\RetourController@index')->name('index');


//----- tracking id 





//export section ---------------
Route::get('/admin/export/{id}', 'admin\ColisController@export_recp')->name('export_recp');
Route::get('/admin/exportdeliv', 'admin\ColisController@export_livred')->name('export_livred');
Route::get('/admin/exportinhouse', 'admin\ColisController@export_in_house')->name('export_in_house');
Route::get('/admin/exportfiche/{id}', 'admin\ColisController@export_deliv')->name('export_deliv');
Route::get('/admin/exportondeliv/{id}', 'admin\ColisController@export_on_deliv')->name('export_on_deliv');

Route::get('/admin/exportretour', 'admin\ColisController@export_retour')->name('export_retour');
Route::get('/admin/exportfailed', 'admin\ColisController@export_failed')->name('export_failed');

//----------------------------
Route::get('/admin/accounting', 'admin\ConfirmedController@index_acounting')->name('index_acounting');
Route::get('/admin/facturation', 'admin\ConfirmedController@index_facturation')->name('index_facturation');
Route::get('/admin/facturation/{id}', 'admin\ConfirmedController@index_facturation_detail')->name('index_facturation_detail');

Route::get('/admin/facturepdf/{id}', 'admin\AccountingController@facture_pdf')->name('facture_pdf');




});



// admin routes inhouse   ---------------------------------- 
Route::get('/admin/commandes', 'admin\CommandesController@index')->name('index');
Route::get('/admin/archoms', 'admin\CommandesController@archive_commandes')->name('archive_commandes');
Route::get('/admin/addcoms/{id}', 'admin\ColisController@upload_colis')->name('upload_colis');
Route::get('/admin/addcoms', 'admin\ColisController@upload_colis')->name('upload_colis');
Route::post('/admin/upload', 'admin\ColisController@import')->name('import');

Route::get('/admin/listcolis/{id}', 'admin\ColisController@list_colis')->name('list_colis');
// admin routes reception   


Route::get('/admin/print-pdf/{id}','admin\ColisController@view_pdf')->name('view_pdf');

Route::get('/admin/print_com/{id}','admin\ColisController@view_pdf_commandes')->name('view_pdf_commandes');


Route::get('/admin/recpuser', 'admin\ClientController@data_recp_client')->name('data_recp_client');

Route::get('/admin/enlivuser', 'admin\ClientController@data_enlivraison_client')->name('data_enlivraison_client');

Route::get('/admin/livreuser', 'admin\ClientController@data_livre_client')->name('data_livre_client');


Route::get('/admin/retouruser', 'admin\ClientController@data_retour_client')->name('data_retour_client');

Route::get('/admin/echoueuser', 'admin\ClientController@data_echoue_client')->name('data_echoue_client');

Route::get('/admin/rec', 'admin\ReceptionController@index')->name('index');
Route::get('/admin/addrecp/{idcom}', 'admin\ReceptionController@add_recp')->name('add_recp');
Route::get('/admin/archrecep', 'admin\ReceptionController@archive_recp')->name('archive_recp');

Route::get('/admin/pass', 'admin\ReceptionController@pass')->name('pass');


Route::get('/admin/tracking', 'TrackingController@index_search')->name('index_search');
Route::get('/admin/tracking/{id}', 'TrackingController@index')->name('index');


});

