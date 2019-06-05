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

//Ruta para recibir datos de sensores
Route::apiResource('/data','ApiDataController')->only('store','show');
Route::apiResource('car/{carId}/sensor','ApiSensorDataController')->only('index','show','store');
Route::get('set_sensor', 'ApiSensorDataController@set');
