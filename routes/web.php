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

//datakader
Route::get('dataKader', 'dataKaderController@index')->name('dataKader');
Route::get('dataKader/create', 'dataKaderController@create')->name('createDataKader');
Route::post('dataKader/store', 'dataKaderController@store')->name('storeDataKader');
Route::get('dataKader/edit/{id}', 'dataKaderController@edit')->name('editDataKader');
Route::post('dataKader/update/{id}', 'dataKaderController@update')->name('updateDataKader');
Route::get('dataKader/delete/{id}', 'dataKaderController@destroy')->name('deleteDataKader');

//dataBidan
Route::get('dataBidan', 'dataBidanController@index')->name('dataBidan');
Route::get('dataBidan/create', 'dataBidanController@create')->name('createDataBidan');
Route::post('dataBidan/store', 'dataBidanController@store')->name('storeDataBidan');
Route::get('dataBidan/edit/{id}', 'dataBidanController@edit')->name('editDataBidan');
Route::post('dataBidan/update/{id}', 'dataBidanController@update')->name('updateDataBidan');
Route::get('dataBidan/delete/{id}', 'dataBidanController@destroy')->name('deleteDataBidan');

