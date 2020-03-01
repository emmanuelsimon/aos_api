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
Route::post('etapes', 'EtapeController@store')->middleware('cors');

Route::post('login', 'API\UserController@userLogin');
Route::post('register', 'API\UserController@userRegister');
Route::group(['middleware' => 'auth:api'], function(){
   Route::get('etapes', 'EtapeController@index')->middleware('cors');
   Route::get('etapes/{id}', 'EtapeController@show')->middleware('cors');
   //Route::post('etapes', 'EtapeController@store')->middleware('cors');
});

//Route::get('etapes', 'EtapeController@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
