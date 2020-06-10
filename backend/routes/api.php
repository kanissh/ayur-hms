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

Route::post('login','AuthController@login');
Route::post('register','AuthController@register');
Route::post('patient/register','PatientController@register');
//Route::get('logout','AuthController@logout');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
