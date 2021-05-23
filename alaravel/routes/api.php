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

Route::get('karyawan', 'apiController@get_all_karyawan');
Route::post('karyawan', 'apiController@insert_data_karyawan');
Route::put('karyawan', 'apiController@update_data_karyawan');
Route::delete('karyawan', 'apiController@delete_data_karyawan');

