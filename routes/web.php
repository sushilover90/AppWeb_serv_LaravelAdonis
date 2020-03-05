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

Route::get('/home','ViewsController@index')->middleware('auth');
Route::get('/',function (){
   return redirect('/login');
});


Route::get('/token/laravel/get','Usercontroller@getLaravelToken')->middleware('auth');
Route::get('/token/laravel/set','Usercontroller@setLaravelToken')->middleware('auth');

Route::get('/token/shodan/get','Usercontroller@getShodanToken')->middleware('auth');
Route::post('/token/shodan/set','Usercontroller@setShodanToken')->middleware('auth');

Route::get('/token/adonis/get','Usercontroller@getAdonisTokens')->middleware('auth');
Route::post('/token/adonis/set','Usercontroller@setAdonisTokens')->middleware('auth');

Route::get('/user/adonis/register','ViewsController@adonisUserRegister')->middleware('auth');
Route::get('/shodan/protocols','ViewsController@protocols')->middleware('auth');

Route::post('/user/adonis/register/request','HttpRequests@adonisCreateUser')->middleware('auth');


/*Route::get('/',function (){
   return redirect('/home');
});*/

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/
