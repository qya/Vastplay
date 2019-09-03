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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/stats', 'HomeController@index')->name('stats');
Route::get('/vast', 'VastController@index')->name('xml');
Route::post('/vast', 'VastController@create')->name('create');
Route::get('/media', 'MediaController@index')->name('media');
Route::post('/media', 'MediaController@store')->name('store');
Route::get('/test', 'VastController@test')->name('test');
Route::get('public/{slug}.xml', ['as'=> 'vast', 'uses'=> 'XMLViewController@show'])->where('slug','[\w\d\-\_]+');