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

Route::group([
    'namespace' => 'Device',
    'prefix' => 'device'
], function () {
    // Device routes
    Route::get('/', 'DeviceController@index');
    Route::get('/{id}', 'DeviceController@show');
    Route::post('/', 'DeviceController@store');
    Route::delete('/{id}', 'DeviceController@delete');

    // Device Geo Location routes
    Route::get('/geo-location', 'DeviceGeoLocationController@index');
    Route::get('/geo-location/{id}', 'DeviceGeoLocationController@show');
    Route::post('/geo-location', 'DeviceGeoLocationController@store');
});
