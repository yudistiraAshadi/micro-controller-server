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

Route::namespace('Api')->group(function () {
    Route::prefix('device')->group(function () {
        // Device routes
        Route::get('/', 'DeviceController@index');
        Route::get('/{id}', 'DeviceController@show');
        Route::post('/', 'DeviceController@store');
        Route::delete('/{id}', 'DeviceController@delete');
    
        // Device Geo coordinate routes
        Route::get('/geo-coordinate', 'DeviceGeoCoordinateController@index');
        Route::get('/geo-coordinate/{id}', 'DeviceGeoCoordinateController@show');
        Route::post('/geo-coordinate', 'DeviceGeoCoordinateController@store');
    });
});