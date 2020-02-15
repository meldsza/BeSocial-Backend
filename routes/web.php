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
    return view('index');
});

Route::get('/admin','AdminController@dashboard');
Route::get('/admin/categories','AdminController@categories');
Route::get('/admin/ngoapplication','AdminController@ngoapplication');
Route::get('/admin/quests','AdminController@quests');
Route::get('/admin/users','AdminController@users');

Route::post('/nGO/{nGO}/verify', 'API\NGOController@verify');
Route::post('/nGO/{nGO}/deverify', 'API\NGOController@deverify');