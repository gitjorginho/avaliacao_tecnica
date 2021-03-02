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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/capturar_carros', 'CarController@capturarCarros')->name('capturar_carros');
Route::post('/capturar', 'CarController@capturar')->name('car_capturar');
Route::delete('/deletar_carro', 'CarController@delete')->name('deletar_carro');
Route::get('/table_list', 'CarController@tableList')->name('table_list');



