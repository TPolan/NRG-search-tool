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


use Illuminate\Support\Facades\Auth;



//Search tool routes:

Auth::routes(['register' => false]);
Route::get('/', 'SearchController@index');
Route::get('/show', 'SearchController@show');

