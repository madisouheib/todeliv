<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Facades\JWTAuth;
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

Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout')->middleware('auth:sanctum');

//Route::middleware('auth')->group( function () {
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

Route::get('/getcommunesbywil/{id}/{hub}', 'admin\WilayaController@get_communes');


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
Route::get('/delivers/{idhub}', 'admin\UsersController@users_data_delivers');
Route::get('/clients/{idhub}', 'admin\UsersController@users_data_clients');

Route::post('/adduser', 'admin\UsersController@store');
Route::post('/addeliver', 'admin\UsersController@store_deliver');
Route::post('/addclient', 'admin\UsersController@store_client');



Route::get('/fetchuser/{id}', 'admin\UsersController@users_data_fetched');

Route::get('/getuser/{id}', 'admin\UsersController@show_user');
Route::get('/getuserdelete/{id}', 'admin\UsersController@show_user_delete');




Route::patch('/editpassuser', 'admin\UsersController@edit_user_pass');
Route::post('/addcom', 'admin\CommandesController@add_com');
Route::post('/addcomwms', 'admin\CommandesController@add_com_wms');

Route::get('/gotcommuns/{id}', 'admin\WilayaController@get_comuns');


//colis 

Route::get('/delivliste/{idliv}', 'admin\OnDeliveryController@data_colis_froute');
Route::get('/getcolis/{id}', 'admin\ColisController@data_colis');
Route::get('/getwmscolis/{id}', 'admin\ColisController@data_colis_wms');

Route::get('/getmeproducts/{id}', 'admin\ColisController@data_colis_products');




Route::get('/inhouse/{id}', 'admin\ColisController@data_colis_inhouse');

//Clients spaces --------------------------------------------------------#
Route::get('/userecp/{id}', 'admin\ClientController@data_user_recp');


Route::get('/userenliv/{id}', 'admin\ClientController@data_user_enliv');

Route::get('/userlivre/{id}', 'admin\ClientController@data_user_livre');

Route::get('/useretour/{id}', 'admin\ClientController@data_user_retour');


Route::get('/userechouer/{id}', 'admin\ClientController@data_user_echoue');

Route::get('/getwils', 'admin\InHouseController@wilaya_tags');


Route::patch('/updstatsuser', 'admin\ClientController@stats_edit');



// failed colis ---------------- routes : 
Route::get('/datafailed/{id}', 'admin\FailedController@data_failed_colis');

Route::get('/undivcode/{user}/{id}', 'admin\FailedController@data_failed_colis_code');


Route::get('/failedwilaya/{id}/{wil}', 'admin\FailedController@data_failed_colis_wilaya');

//------------Mise a jour 
Route::get('/failedupdate/{user}/{id}', 'admin\FailedController@data_failed_colis_updat');

Route::get('/datafailfiltre/{id}/{client}', 'admin\FailedController@data_failed_filtre_colis');
Route::get('/failedtentativ/{id}/{tent}', 'admin\FailedController@colis_filtre_tentatives');



Route::get('/getclients', 'admin\ColisController@data_clients');



// get livreur price 
Route::get('/livreurdetail/{id}', 'admin\OnDeliveryController@detail_livreur');

Route::get('/livreurfiche/{id}', 'admin\OnDeliveryController@detail_livreur_fiche');


Route::get('/livreurstats/{id}', 'admin\OnDeliveryController@detail_livreur_stats');

//----deliver update :::::::: ----------

Route::post('/delivretour', 'admin\LivraisonController@deliver_retour');

Route::get('/getstats', 'admin\StatsController@stats_tags');
Route::get('/getdeliver/{id}', 'admin\StatsController@stats_deliver');



Route::get('/getstatsclient', 'admin\StatsController@stats_tags_client');

Route::get('/stats/{id}', 'admin\StatsController@stats_nav');

Route::get('/statsuser/{id}', 'admin\StatsController@stats_nav_user');



Route::get('/getstatus/{id}', 'admin\StatsColisController@stats_show');


Route::patch('/validelivery', 'admin\OnDeliveryController@validate_delevery_gp');

Route::patch('/validfichedeliv/{id}', 'admin\OnDeliveryController@validate_delevery_fiche');

Route::get('/track/{id}', 'admin\StatsColisController@tracking_show');

Route::get('/tracksearch/{id}', 'admin\StatsColisController@tracking_show_search');




Route::get('/getcolisvaldiation/{id}', 'admin\ColisController@data_colis_validation');
Route::get('/getcolisvaldiationwms/{id}', 'admin\ColisController@data_colis_validation_wms');


Route::get('/getcolisrecp/{id}', 'admin\ColisController@data_colis_recp');

Route::patch('/valdiationgrp', 'admin\ColisController@validate_colis_gp');

Route::patch('/valdiationwmsgrp', 'admin\ColisController@validate_colis_gp_wms');


Route::patch('/signalgrp', 'admin\ColisController@signaler_colis_gp');


Route::post('/addstatscolis', 'admin\StatsColisController@add_stats_colis');


Route::post('/addstatsredsip', 'admin\StatsColisController@add_stats_redispatch');

Route::post('/addstatscols', 'admin\StatsColisController@add_stats_colis_gp');

Route::post('/addstgpredisp', 'admin\StatsColisController@add_stats_redispatch_gp');



/// FIche SESCTION -----------------------------------------------------------
Route::get('/getfroute/{id}', 'admin\FicheController@data_fiche');

Route::get('/getcolisfiche/{id}', 'admin\FicheColisController@data_fiche_colis');
Route::delete('/deletecolisfiche/{id}', 'admin\FicheColisController@delete_colis_fiche');

Route::post('/addcolisfiche', 'admin\FicheColisController@add_colis_fiche');
Route::get('/inhousedata', 'admin\FicheColisController@data_colis_inhouse');

Route::get('/getlivreur/{id}', 'admin\FicheController@data_livreur');
Route::get('/getlasf', 'admin\FicheController@get_last_id');


Route::post('/addfiche', 'admin\FicheController@add_fiche');

Route::patch('/validfiche', 'admin\FicheController@valid_fiche');


Route::patch('/invalidfiche', 'admin\FicheController@invalid_fiche');


//transit part --------------------

Route::get('/sendtrasnit/{id}','admin\TransitController@transit_data_send');

Route::get('/receivetrasnit/{id}','admin\TransitController@transit_data_receiver');

Route::patch('/envtransit/{id}','admin\TransitController@transit_send_valid');
Route::patch('/recptransit','admin\TransitController@transit_send_recu');


Route::get('/getnfostrans/{id}','admin\TransitController@transit_data_infos');

Route::post('/addtransit','admin\TransitController@transit_data_add');


Route::get('/getcolistransit/{id}','admin\TransitController@transit_data_colis' );


Route::post('/addcoltrans','admin\TransitController@transit_add_colis');

Route::post('/delcoltrans','admin\TransitController@transit_remove_colis');

Route::patch('/approvcoltrans/{id}','admin\TransitController@transit_approv_colis');

Route::patch('/unselectcoltrans/{id}','admin\TransitController@transit_unselect_colis');








// Deleried  list 


Route::get('/delivered/{id}', 'admin\LivraisonController@get_delivred');
Route::get('/deliv/{id}', 'admin\LivraisonController@get_delivred_livreur');


Route::get('/codedeliv/{id}', 'admin\LivraisonController@code_delivred');

Route::patch('/livred/{id}', 'admin\LivraisonController@delivred_qrcode');



Route::get('/afterdelivred/{part}/{etat}/{wil}', 'admin\ConfirmedController@get_delivred_confirmed');


Route::get('/delivredwils/{id}', 'admin\LivraisonController@filtre_wil_delivred');



Route::get('/returned/{id}', 'admin\LivraisonController@get_returned');
Route::get('/refiltrtent/{id}/{user}', 'admin\LivraisonController@get_returned_tentatives');
Route::get('/retourliv/{id}/{user}', 'admin\LivraisonController@get_returned_lv');

Route::get('/retourwils/{wil}/{id}', 'admin\LivraisonController@get_returned_wilaya');

Route::patch('/validreturned', 'admin\LivraisonController@update_retour_cash');


Route::patch('/transversretour/{id}', 'admin\RetourController@trasnfer_retour');



Route::get('/coderetour/{id}', 'admin\LivraisonController@get_returned_barecode');



Route::get('/return/{id}', 'admin\LivraisonController@get_get_returned_livreur');

Route::get('/delivwilayas', 'admin\LivraisonController@get_wils_delivred');



Route::patch('/cashbygp', 'admin\ColisController@update_all_livre');


Route::get('/getcoms/{id}', 'admin\CommandesController@data_coms');
Route::get('/getcomswms/{id}', 'admin\CommandesController@data_coms_wms');
Route::get('/getarchivecoms/{id}', 'admin\CommandesController@data_coms_archive');

Route::get('/getcolisinfos/{id}', 'admin\ColisController@infos_colis');

Route::get('/bytentative/{tent}/user/{id}', 'admin\InHouseController@data_tentatives');
Route::get('/bywilayah/{wil}/{id}', 'admin\InHouseController@data_filtre_wils');
Route::get('/byclienth/{clt}/{id}', 'admin\InHouseController@data_filtre_client');
Route::get('/codehouse/{code}/{id}', 'admin\InHouseController@data_filtre_codebars');


Route::get('/filtreflist/{id}', 'admin\InHouseController@data_filtre_codebars');



Route::post('/addcolis', 'admin\ColisController@add_colis');
//-----------------------------------

Route::patch('/tmpcolisv', 'admin\ColisController@tmp_colis_validate');
Route::patch('/wmstmpcolisv', 'admin\ColisController@tmp_colis_validate_wms');



Route::patch('/tmpsignalergrp', 'admin\ColisController@tmp_colis_signaler');

Route::patch('/signalone', 'admin\ColisController@colis_signaler');
Route::patch('/validbyone', 'admin\ColisController@colis_valider');


Route::patch('/cashbyone', 'admin\ColisController@cash_by_one');


Route::get('/deliverylist/{id}', 'admin\OnDeliveryController@data_livreur');



Route::get('/filtredevlist/{tent}', 'admin\OnDeliveryController@data_colis_filtre_tent');
Route::get('/fichelist/{user}', 'admin\OnDeliveryController@data_colis_listfiche');

Route::get('/wilayaflist/{liv}', 'admin\OnDeliveryController@data_wilaya_listfiche');

//new liste 
Route::get('/delivbyliv/{liv}', 'admin\OnDeliveryController@data_deliv_byliv');

Route::get('/filtreflist/{id}', 'admin\OnDeliveryController@data_filtre_listfiche');



Route::delete('/deletecolis/{id}', 'admin\ColisController@colis_delete');

Route::get('/getmanifs/{id}', 'admin\CommandesController@data_manifs');

Route::get('/getwmsmanifs/{id}', 'admin\CommandesController@data_manifs_wms');


Route::get('/getarchivemanifs', 'admin\CommandesController@data_manifs_archive');




//en livraison 
Route::get('/ondelevery/{id}', 'admin\LivraisonController@data_livreur_delevery');

//en livraison 
Route::get('/getcoursier', 'admin\LivraisonController@data_livreur_list');


// data accounting -------
Route::get('/fichescompta', 'admin\AccountingController@data_account');


Route::get('/fichescompta/{id}', 'admin\AccountingController@data_account_filtred');


Route::get('/fichescomptas/{stats}', 'admin\AccountingController@data_account_etat');
Route::get('/comptadetail/{id}', 'admin\AccountingController@data_compta_detail');

Route::patch('/updprice', 'admin\AccountingController@compta_update_price');


Route::get('/getdelivred', 'admin\LivraisonController@data_fiche_delevery');



Route::get('/filtredelivery/{id}', 'admin\OnDeliveryController@filtre_fiche_delevery_validation');

Route::get('/fetchdeliv/{id}', 'admin\OnDeliveryController@filtre_fiche_delevery_livreur');


Route::get('/getfiltrefroute/{id}', 'admin\FicheController@data_fiche_filtre');

Route::get('/getfichebyliv/{id}', 'admin\FicheController@data_fiche_filtre_livr');


Route::get('/enlivstats/{idliv}', 'admin\OnDeliveryController@stats_liv_fiche');

Route::patch('/validatemanif/{id}', 'admin\CommandesController@validate_manif');
Route::patch('/cloturemanif/{id}', 'admin\CommandesController@cloture_manif');
Route::patch('/validatemanifuser/{id}', 'admin\CommandesController@validate_manif_user');
Route::patch('/validatewmsmanifuser', 'admin\CommandesController@validate_manif_wms');



Route::get('/getclientpro', 'admin\UsersController@data_client_pro');


Route::get('/getCominfos/{id}', 'admin\CommandesController@infos_coms');

Route::delete('/deleteuser/{id}', 'admin\UsersController@user_delete');

Route::get('/manifetat/{code}', 'admin\CommandesController@filtre_etat');

Route::get('/manifiltre/{code}', 'admin\CommandesController@filtre_client');



Route::delete('/deletecoms/{id}', 'admin\CommandesController@manif_delete');




Route::post('/addfacture', 'admin\AccountingController@create_invoice');

Route::patch('/validfacture', 'admin\AccountingController@valid_invoice');
Route::get('/fichpart/{id}', 'admin\AccountingController@part_data');

Route::patch('/updprices', 'admin\AccountingController@udpate_prices');


Route::get('/bordereau', 'admin\BordereauController@data_bord');
Route::post('/updatbord','admin\BordereauController@update_bord');


//add products --------


//Route::get('/addproduct', 'admin\BordereauController@add_product');

Route::post('/addproduct', 'admin\wms\ProductsController@add_product');

Route::get('/getstores/{idstore}', 'admin\wms\StoresController@get_stores');

Route::get('/getproducts/{iduser}', 'admin\wms\ProductsController@list_product');

Route::get('/wmstores', 'admin\wms\StoresController@list_partenaire');
Route::get('/wmsallstores', 'admin\wms\StoresController@list_stores_wms');
Route::get('/allstores', 'admin\wms\StoresController@liste_stores');
Route::post('/addwmstore', 'admin\wms\StoresController@add_storewms');

Route::get('/getwmslist/{store}', 'admin\wms\WmsController@list_wms_bystore');


Route::get('/getstore/{id}', 'admin\wms\StoresController@brand_store_show');


Route::post('/updtmystore/{id}', 'admin\wms\StoresController@brand_store');

Route::get('/mystores/{id}', 'admin\wms\StoresController@my_stores');

Route::post('/addpackbyuser', 'admin\wms\PickupController@add_package_user');


// wms ----------- section --------------  : 


Route::get('/getwms', 'admin\wms\WmsController@list_wms');

Route::get('/getpickups/{id}', 'admin\wms\PickupController@list_pickups');

Route::post('/pickqrcode', 'admin\wms\PickupController@approved_product');

Route::get('/getpackages/{id}', 'admin\wms\PickupController@packages');
Route::get('/getpackclosed/{id}', 'admin\wms\PickupController@packages_closed');
Route::get('/packagesbystore/{id}', 'admin\wms\PickupController@packages_bystore');

Route::get('/packagesbystore/{id}', 'admin\wms\PickupController@packages_bystore');

Route::get('/packagesbyuser/{id}', 'admin\wms\PickupController@packages_bystore_user');

Route::post('/addstoreuser', 'admin\wms\StoresController@add_store_user');
Route::get('/countwms/{id}', 'admin\wms\StoresController@count_wms');


Route::get('/getproducts', 'admin\wms\ProductsController@all_product');

Route::get('/productstore/{id}', 'admin\wms\ProductsController@products_bystore_admin');

Route::get('/pbystore/{id}', 'admin\wms\ProductsController@products_bystore_user');

Route::get('/userproducts/{id}', 'admin\wms\ProductsController@products_bystore');


Route::get('/wmstickets/{id}', 'admin\wms\PickupController@products_ticket');




//pbystore

Route::post('/addwms', 'admin\wms\WmsController@add_wms');
Route::patch('/editwms/{idwms}', 'admin\wms\WmsController@edit_wms');


Route::post('/addpackage', 'admin\wms\PickupController@add_package');
Route::post('/addexistproduct', 'admin\wms\PickupController@add_exist_product');

Route::patch('/failedpickup', 'admin\wms\PickupController@pickup_failed');

Route::patch('/confirmticket', 'admin\wms\PickupController@pickup_close');


Route::patch('/validpickup/{id}', 'admin\wms\PickupController@validation_pickup_user');
Route::patch('/delpickups/{id}', 'admin\wms\PickupController@delete_pickup_user');

Route::post('/delfieldpickup/{id}', 'admin\wms\PickupController@delete_fpickup_user');
Route::patch('/editfieldpickup/{id}', 'admin\wms\PickupController@edit_fpickup_user');



//------------- edit colis ----------------
Route::patch('/fixwilaya', 'admin\ColisController@fix_colis_wilaya');
Route::patch('/fixcommun', 'admin\ColisController@fix_colis_commune');

Route::patch('/fixproduct', 'admin\ColisController@fix_colis_product');







//------------------------ gets tags wilaya 



Route::get('/getwilas', 'admin\WilayaController@get_wilaya_arr');
Route::get('/getcommuns', 'admin\WilayaController@get_communs_arr');

Route::get('/filtrcomuns/{id}', 'admin\WilayaController@get_communs_filtre');




//---------- WMS ----- Transit ---------------


Route::get('/wmsendtrasnit/{id}', 'admin\wms\TransitController@index_send');
Route::get('/wmsrecivtrasnit/{id}', 'admin\wms\TransitController@index_receiver');

Route::get('/getwmstransinfo/{id}','admin\wms\TransitController@my_wmshub');
Route::post('/addwmstransit', 'admin\wms\TransitController@add_transit_wms');

Route::get('/wmshubs', 'admin\wms\TransitController@list_wms');

// details send wsm transit -------

Route::get('/inwmsdata/{id}', 'admin\wms\TransitController@get_wms_products');
Route::get('/getwsmtransitp/{id}', 'admin\wms\TransitController@transit_wms_products');

Route::post('/delwmstrans', 'admin\wms\TransitController@transit_send_product_remove');

Route::post('/addproducttrans', 'admin\wms\TransitController@transit_send_product_add');

Route::patch('/cloturetransit', 'admin\wms\TransitController@transit_send_cloture');
Route::get('/productinfo/{id}/{transit}', 'admin\wms\TransitController@product_info');
Route::patch('/cancelproduct', 'admin\wms\TransitController@cancel_product_transit');


Route::get('/getmanagerproducts/{id}', 'admin\wms\ProductsController@products_manager');
Route::get('/managerstores/{id}', 'admin\wms\StoresController@stores_manager');
Route::get('/managerpackages/{id}', 'admin\wms\PickupController@pickups_manager');

Route::patch('/confirmproductransit', 'admin\wms\TransitController@confirm_product_transit');


Route::patch('/transitcloture', 'admin\wms\TransitController@transit_receive_cloture');

//---------- Hub Wilaya  -----  la liste des wilayas  ---------------

Route::get('/wilayabyhub/{id}', 'admin\HubsController@list_wilayabyhubs');

Route::post('/addwiltohub', 'admin\HubsController@add_wilaya_tohub');
Route::patch('/delwiltohub', 'admin\HubsController@delete_wilaya_tohub');


//------- zonnes ------------ listing routes 


Route::get('/zones', 'admin\ZonesController@list_zones');
Route::post('/addzone', 'admin\ZonesController@add_zone');
Route::patch('/editzone', 'admin\ZonesController@edit_zone');
Route::post('/delzone', 'admin\ZonesController@delete_zone');


Route::get('/communsbyzone/{id}', 'admin\ZonesController@list_zone_communes');
Route::get('/getwalls/{id}', 'admin\ZonesController@list_wilaya');
Route::get('/zonegetcomuns/{id}/{wilaya}', 'admin\ZonesController@list_communs');
Route::post('/addcomszone', 'admin\ZonesController@add_zone_commun');
Route::post('/delcomzone', 'admin\ZonesController@delete_zone_commun');


Route::get('/listdeliverszone/{id}', 'admin\ZonesController@list_zone_delivers');
Route::get('/getzdelivers/{id}', 'admin\ZonesController@zone_delivers');
Route::post('/deliveraddzone', 'admin\ZonesController@add_zone_deliver');
Route::post('/delzondeliver', 'admin\ZonesController@delete_zone_deliver');
Route::get('/gotdeliverz/{id}', 'admin\ZonesController@show_deliver');
Route::patch('/delivereditzone', 'admin\ZonesController@edit_deliver');

Route::patch('/enabldeliver/{id}', 'admin\ZonesController@enable_deliver');
Route::patch('/disabldeliver/{id}', 'admin\ZonesController@disable_deliver');


//---------- dispatch :::: 

Route::post('/deliverdispatch/{id}/{added}', 'admin\ZonesController@dispatch_deliver');
Route::get('/ondeliverynow/{id}', 'admin\inventory\InventoryController@list_delivers');
Route::get('/ondelivnow/{id}', 'admin\inventory\InventoryController@on_delivery_list');


Route::get('/getAllSheets/{q?}', 'api\GoogleSheetApiController@getAllSheets')->name('getAllSheets');


//------- Google API Sheets ------------

/**
 * Adding URL Of Sheet
 */
Route::post('/addSheet', 'api\GoogleSheetApiController@addSheet');
Route::get('/editSheet/{id}', 'api\GoogleSheetApiController@editSheet');
Route::patch('/editSheet/{id}', 'api\GoogleSheetApiController@updateSheet');
Route::delete('/deleteSheet/{id}', 'api\GoogleSheetApiController@deleteSheet');

/**
 * Add Tab Sheet Name
 */
Route::get('/addTabSheet/{id}', 'api\GoogleSheetApiController@addTabSheet')->name('addTabSheet');
Route::post('/addTabSheet/{id}', 'api\GoogleSheetApiController@storeTabSheet')->name('storeTabSheet');
Route::delete('/deleteTab/{id}', 'api\GoogleSheetApiController@deleteTab');

/**
 * Get Tabs
 */
Route::get('/getAllTabs/{id}', 'api\GoogleSheetApiController@getAllTabs');
/**
 * Getting Data from Google Sheets
 */
Route::get('/getSheet', 'api\GoogleSheetApiController@getSheet')->name('getSheetData');



 //});

