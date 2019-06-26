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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//list all entities
Route::get('dummy','dummyController@index');
//list single entity
Route::get('dummy/{id}','dummyController@show');
//create new entity
Route::post('dummy','dummyController@store');
//update an entity
Route::put('dummy','dummyController@store');
//delete an entity
Route::delete('dummy/{id}','dummyController@destroy');