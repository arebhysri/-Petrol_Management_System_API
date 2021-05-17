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

//login credential
Route::get('loginsystem/username/{username}/password/{password}','App\Http\Controllers\UserDetailController@userLoginCredentials');

//Inventory API records
Route::post('createfuelinventory/{id}','App\Http\Controllers\FuelinventorydetailController@createNewFuelInventory');
Route::get('getallrecord', 'App\Http\Controllers\FuelinventorydetailController@getAllRecord');
Route::get('getsinglerecordbyid/{id}','App\Http\Controllers\FuelinventorydetailController@getSingleRecordById');

//fueltype detail
Route::get('getallfuelrecord', 'App\Http\Controllers\FualtypeController@getAllFuelType');
Route::post('createfuelType/{id}','App\Http\Controllers\FualtypeController@createNewFuelType');
Route::get('getallfuelrecordbyid/{id}', 'App\Http\Controllers\FualtypeController@getSingleFuelRecordById');

//pump detail controller
Route::get('getallpumprecord', 'App\Http\Controllers\PumbertypeController@getAllPumperType');
Route::post('createPumb/{id}', 'App\Http\Controllers\PumbertypeController@createNewPumb');
Route::get('getallPumbrecordbyid/{id}', 'App\Http\Controllers\PumbertypeController@getSinglePumbRecordById');
Route::get('getallPumbrecordbyfuelcode/{fuelcode}', 'App\Http\Controllers\PumbertypeController@getPumbRecordByFuelCode');