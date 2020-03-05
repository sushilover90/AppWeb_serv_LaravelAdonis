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


Route::get('/token/laravel/set','Usercontroller@setLaravelToken')->middleware('auth:api');
Route::post('/token/shodan/set','Usercontroller@setShodanToken')->middleware('auth:api');
//Route::get('/token/laravel/get','Usercontroller@getLaravelToken')->middleware('auth:api');
