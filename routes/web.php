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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'berandaController@beranda')->name('beranda');

//posyandu
Route::get('posyandu', 'posyanduController@index')->name('posyandu');
Route::get('posyandu/create', 'posyanduController@create')->name('createPosyandu');
Route::post('posyandu/store', 'posyanduController@store')->name('storePosyandu');
Route::get('posyandu/edit/{id_posyandu}', 'posyanduController@edit')->name('editPosyandu');
Route::post('posyandu/update', 'posyanduController@update')->name('updatePosyandu');
Route::get('posyandu/delete/{id_posyandu}', 'posyanduController@destroy')->name('deletePosyandu');