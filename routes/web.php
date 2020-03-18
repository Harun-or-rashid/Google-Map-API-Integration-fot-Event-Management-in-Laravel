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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/create-event','EventController@create');
Route::get('login',function (){
    return view('vendor.voyager.index');
});

Route::get('login',function (){
    return view('vendor.voyager.index');
});
Route::get('/map',function (){
   return view('vendor.voyager.map.create');
});
Route::get('/create-event','EventController@create');
Route::post('/create-events','EventController@store');
