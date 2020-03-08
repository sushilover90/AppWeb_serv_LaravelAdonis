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

Route::get('/',function (){
   return redirect('/login');
});


Route::get('/token/laravel/get','Usercontroller@getLaravelToken')->middleware('auth');
Route::get('/token/laravel/set','Usercontroller@setLaravelToken')->middleware('auth');

Route::get('/token/shodan/get','Usercontroller@getShodanToken')->middleware('auth');
Route::post('/token/shodan/set','Usercontroller@setShodanToken')->middleware('auth');

Route::get('/token/adonis/get','Usercontroller@getAdonisTokens')->middleware('auth');
Route::post('/token/adonis/set','Usercontroller@setAdonisTokens')->middleware('auth');

Route::get('/home','ViewsController@index')->middleware('auth');
Route::get('/shodan/protocols','ViewsController@protocols')->middleware('auth');
Route::get('/shodan/ports','ViewsController@ports')->middleware('auth');
Route::get('/shodan/triggers','ViewsController@triggers')->middleware('auth');
Route::get('/shodan/facets','ViewsController@facets')->middleware('auth');
Route::get('/shodan/ip','ViewsController@ip')->middleware('auth');

Auth::routes();
