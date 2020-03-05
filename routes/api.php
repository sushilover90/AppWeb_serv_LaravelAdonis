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

Route::get('/shodan/protocols','HttpRequests@Protocols')->middleware('auth:api');
Route::get('/shodan/ports','HttpRequests@ports')->middleware('auth:api');
Route::get('/shodan/facets','HttpRequests@facets')->middleware('auth:api');
Route::get('/shodan/ip','HttpRequests@ip')->middleware('auth:api');
Route::get('/shodan/triggers','HttpRequests@triggers')->middleware('auth:api');
