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
//Route::post('/addhub', 'admin\HubsController@hub_add');
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
Route::get('/getuserdelete/{id}', 'admin\UsersController@show_user_delete');

Route::patch('/edituser', 'admin\UsersController@edit_user');

Route::patch('/editpassuser', 'admin\UsersController@edit_user_pass');
Route::post('/addcom', 'admin\CommandesController@add_com');


//colis 


Route::get('/getcolis/{id}', 'admin\ColisController@data_colis');

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


Route::get('/getstats', 'admin\StatsController@stats_tags');

Route::get('/getstatsclient', 'admin\StatsController@stats_tags_client');

Route::get('/stats/{id}', 'admin\StatsController@stats_nav');

Route::get('/statsuser/{id}', 'admin\StatsController@stats_nav_user');



Route::get('/getstatus/{id}', 'admin\StatsColisController@stats_show');


Route::patch('/validelivery', 'admin\OnDeliveryController@validate_delevery_gp');

Route::patch('/validfichedeliv/{id}', 'admin\OnDeliveryController@validate_delevery_fiche');

Route::get('/track/{id}', 'admin\StatsColisController@tracking_show');

Route::get('/tracksearch/{id}', 'admin\StatsColisController@tracking_show_search');




Route::get('/getcolisvaldiation/{id}', 'admin\ColisController@data_colis_validation');


Route::get('/getcolisrecp/{id}', 'admin\ColisController@data_colis_recp');

Route::patch('/valdiationgrp', 'admin\ColisController@validate_colis_gp');
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
