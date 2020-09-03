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




Route::post("login","UserAPIController@login");



Route::resource('v1/users', 'UserAPIController');


Route::resource('v1/patients', 'PatientsAPIController');


Route::resource('v1/hospitals', 'HospitalAPIController');


Route::resource('v1/statuses', 'StatusAPIController');
