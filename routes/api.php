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
Route::group(['middleware' => 'auth:api'], function(){
    // etapes
    Route::post('etapes', 'EtapeController@store');//->middleware('cors');
    Route::get('etapes', 'EtapeController@index');//->middleware('cors');
    Route::get('etapes/{id}', 'EtapeController@show');//->middleware('cors');
    Route::delete('etapes/{id}', 'EtapeController@delete');//->middleware('cors');
    Route::put('etapes/{id}', 'EtapeController@update');//->middleware('cors');
    Route::post('etapes', 'EtapeController@store');//->middleware('cors');
    // categorie depenses
    Route::get('categorieDepense', 'CategorieDepenseController@index');//->middleware('cors');
    // depenses
    Route::post('depenses', 'DepenseController@store');//->middleware('cors');
    Route::get('depenses', 'DepenseController@index');//->middleware('cors');
    Route::get('depenses/{id}', 'DepenseController@show');//->middleware('cors');
    //Route::delete('depenses/{id}', 'DepenseController@delete');
    Route::put('depenses/{id}', 'DepenseController@update');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
