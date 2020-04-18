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
Route::get('etapes', 'EtapeController@index');
Route::get('etapes/{id}/voyage', 'EtapeController@etapesByVoyageId');
Route::get('voyages', 'VoyageController@index');
Route::get('voyages/{id}', 'VoyageController@show');

Route::group(['middleware' => 'auth:api'], function(){
    // etapes
    Route::post('etapes', 'EtapeController@store');
    Route::get('etapes/{id}', 'EtapeController@show');
    Route::delete('etapes/{id}', 'EtapeController@delete');
    Route::put('etapes/{id}', 'EtapeController@update');
    Route::post('etapes', 'EtapeController@store');
    // categorie depenses
    Route::get('categorieDepense', 'CategorieDepenseController@index');
    // depenses
    Route::post('depenses', 'DepenseController@store');
    Route::get('depenses', 'DepenseController@index');
    Route::get('depenses/{id}', 'DepenseController@show');
    //Route::delete('depenses/{id}', 'DepenseController@delete');
    Route::put('depenses/{id}', 'DepenseController@update');
    // voyages
    Route::put('voyages/{id}/restore', 'VoyageController@restore');
    Route::post('voyages', 'VoyageController@store');
    Route::delete('voyages/{id}', 'VoyageController@delete');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
