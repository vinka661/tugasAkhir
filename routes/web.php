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
Route::post('posyandu/update/{id_posyandu}', 'posyanduController@update')->name('updatePosyandu');
Route::get('posyandu/delete/{id_posyandu}', 'posyanduController@destroy')->name('deletePosyandu');

//bayiBalita
Route::get('bayiBalita', 'bayiBalitaController@index')->name('bayiBalita');
Route::get('bayiBalita/create', 'bayiBalitaController@create')->name('createBayiBalita');
Route::post('bayiBalita/store', 'bayiBalitaController@store')->name('storeBayiBalita');
Route::get('bayiBalita/edit/{id_bb}', 'bayiBalitaController@edit')->name('editBayiBalita');
Route::post('bayiBalita/update/{id_bb}', 'bayiBalitaController@update')->name('updateBayiBalita');
Route::get('bayiBalita/delete/{id_bb}', 'bayiBalitaController@destroy')->name('deleteBayiBalita');

//user
Route::get('user', 'userController@index')->name('user');
Route::get('user/create', 'userController@create')->name('createUser');
Route::post('user/store', 'userController@store')->name('storeUser');
Route::get('user/edit/{id}', 'userController@edit')->name('editUser');
Route::post('user/update/{id}', 'userController@update')->name('updateUser');
Route::get('user/delete/{id}', 'userController@destroy')->name('deleteUser');

//kader
Route::get('kader', 'kaderController@index')->name('kader');
Route::get('kader/edit/{id}', 'kaderController@edit')->name('editKader');
Route::post('kader/update/{id}', 'kaderController@update')->name('updateKader');
Route::get('kader/delete/{id}', 'kaderController@destroy')->name('deleteKader');

//bidan desa
Route::get('bidan', 'bidanController@index')->name('bidan');
Route::get('bidan/edit/{id}', 'bidanController@edit')->name('editBidan');
Route::post('bidan/update/{id}', 'bidanController@update')->name('updateBidan');
Route::get('bidan/delete/{id}', 'bidanController@destroy')->name('deleteBidan');