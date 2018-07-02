<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{pincode}', 'PincodeController@getLocation')->where('pincode', '[0-9]+');
Route::get('/info','PincodeController@getPincode');
Route::post('/statecode','state_code_controller@save_state_code');

