<?php

use Illuminate\Http\Request;

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

Route::post('login', 'API\UserController@userLogin');
Route::post('register', 'API\UserController@userRegister');
/*Route::get('etapes', 'EtapeController@index');
Route::get('etapes/{id}/voyage', 'EtapeController@etapesByVoyageId');
Route::get('voyages', 'VoyageController@index');
Route::get('voyages/{id}', 'VoyageController@show');
Route::get('depenses', 'DepenseController@index');
Route::get('depenses/{id}', 'DepenseController@show');
Route::get('etapes/{id}', 'EtapeController@show');
*/


Route::group(['middleware' => 'api'], function(){
    Route::post('voyages', 'VoyageController@store');
    Route::get('voyages', 'VoyageController@index');
    Route::get('voyages/{id}', 'VoyageController@show');
    Route::post('etapes', 'EtapeController@store');

    // etapes
    /*Route::post('etapes', 'EtapeController@store');Route::delete('etapes/{id}', 'EtapeController@delete');
    Route::put('etapes/{id}', 'EtapeController@update');
    // categorie depenses
    Route::get('categorieDepense', 'CategorieDepenseController@index');
    // depenses
    Route::post('depenses', 'DepenseController@store');
    //Route::delete('depenses/{id}', 'DepenseController@delete');
    Route::put('depenses/{id}', 'DepenseController@update');
    // voyages
    Route::put('voyages/{id}/restore', 'VoyageController@restore');
    Route::post('voyages', 'VoyageController@store');
    Route::delete('voyages/{id}', 'VoyageController@delete');*/
});

Route::group(['middleware' => 'api'], function() {
    Route::post('voyages', 'VoyageController@store');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
