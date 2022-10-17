<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/apartment/new', 'ApartmentController@newEntity');
Route::post('/apartment/create', 'ApartmentController@create');
Route::get('/apartment/exists/{id}', 'ApartmentController@existsEntity');
Route::get('/apartment/list', 'ApartmentController@list');
Route::post('/apartment/update', 'ApartmentController@update');


Route::get('/mortgage/new', 'MortgageController@newEntity');
Route::get('/mortgage/list', 'MortgageController@list');
Route::post('/mortgage/create', 'MortgageController@create');
Route::post('/mortgage/update', 'MortgageController@update');
Route::get('/mortgage/exists/{id}', 'MortgageController@existsEntity');
