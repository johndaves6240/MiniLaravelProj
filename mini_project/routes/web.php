<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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
    return view('place');
});

Route::post('submit','App\Http\Controllers\EventController@store');

Route::GET('planned', 'App\Http\Controllers\EventController@index');

Route::POST('back','App\Http\Controllers\EventController@back');

Route::post('delete', 'App\Http\Controllers\EventController@delete');

Route::post('update','App\Http\Controllers\EventController@update');
