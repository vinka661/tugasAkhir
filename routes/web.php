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
//dashboard

Auth::routes();
Route::get('/', 'dashboardController@dashboard')->name('dashboard');
Route::get('beranda', 'berandaController@beranda')->name('beranda');

//dashboard
Route::get('berandaOperator', 'dashboardController@dashboardOperator')->name('berandaOperator');
Route::get('berandakader', 'dashboardController@dashboardKaderdanBidan')->name('berandaKader');
Route::get('berandaBidan', 'dashboardController@dashboardKaderdanBidan')->name('berandaBidan');
//operator
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

//timbangbayibalita
Route::get('timbangbayiBalita', 'kaderController@bayiTimbangIndex')->name('timbangbayiBalita');
Route::get('timbang/detailtimbangbayiBalita/{id_bb}', 'kaderController@detailTimbangBayi')->name('detailTimbangBayi');
Route::get('timbang/createTimbang/{bayiBalita?}', 'kaderController@createTimbang')->name('createTimbang');
Route::post('timbang/Timbang', 'kaderController@storeTimbang')->name('storeTimbang');
Route::get('timbang/edit/{id_timbang}', 'kaderController@editTimbang')->name('editTimbang');
Route::post('timbang/update/{id_timbang}', 'kaderController@updateTimbang')->name('updateTimbang');
Route::get('timbang/delete/{id_timbang}', 'kaderController@destroyTimbang')->name('deleteTimbang');

//timbang 
Route::get('timbang', 'kaderController@timbang')->name('timbang');

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

//Laporan
Route::get('laporan', 'laporanController@index')->name('laporan');

//kepala PLKB
//data diri
// Route::get('kepala/dataDiri/{id}', 'kepalaController@show')->name('dataKepala');
// Route::get('kepala/dataDiri/edit/{id}', 'kepalaController@editData')->name('editDataKepala');
// Route::post('kepala/dataDiri/update/{id}', 'kepalaController@updateData')->name('updateDataKepala');

// data diri profile
Route::post('/edit-profil','profileController@editprofil')->name('profile');
Route::group(["middleware" => "auth"], function() {
    Route::get('/user/profile/{user}', 'profileController@indexprofil')->name('user.profile');
    Route::get('/user/profile/edit/{user}', 'profileController@editProfile')->name('user.profile.edit');
    Route::post('/user/profile/update/{user}', 'profileController@updateProfile')->name('user.profile.update');
});


//bidan desa
//jadwal penyuluhan
Route::get('penyuluhan', 'bidanController@penyuluhan')->name('penyuluhan');
Route::get('penyuluhan/create', 'bidanController@createPenyuluhan')->name('createPenyuluhan');
Route::post('penyuluhan/store', 'bidanController@storePenyuluhan')->name('storePenyuluhan');
Route::get('penyuluhan/edit/{id_penyuluhan}', 'bidanController@editPenyuluhan')->name('editPenyuluhan');
Route::post('penyuluhan/update/{id_penyuluhan}', 'bidanController@updatePenyuluhan')->name('updatePenyuluhan');
Route::get('penyuluhan/delete/{id_penyuluhan}', 'bidanController@destroyPenyuluhan')->name('deletePenyuluhan');

//Upload Penyuluhan
Route::get('penyuluhanKader', 'kaderController@penyuluhanKader')->name('penyuluhanKader');
Route::get('UploadMateripenyuluhan/upload/{id_penyuluhan}', 'kaderController@UploadMateriPenyuluhan')->name('UploadMateriPenyuluhan');
Route::post('uploadVideo/{id_penyuluhan}', 'kaderController@uploadVideo')->name('uploadVideo');

//jadwal Posyandu
Route::get('jadwalPosyandu', 'bidanController@jadwalPosyandu')->name('jadwalPosyandu');
Route::get('jadwalPosyandu/create', 'bidanController@createJadwalPosyandu')->name('createJadwalPosyandu');
Route::post('jadwalPosyandu/store', 'bidanController@storeJadwalPosyandu')->name('storeJadwalPosyandu');
Route::get('jadwalPosyandu/edit/{id_jadwal}', 'bidanController@editJadwalPosyandu')->name('editJadwalPosyandu');
Route::post('jadwalPosyandu/update/{id_jadwal}', 'bidanController@updateJadwalPosyandu')->name('updateJadwalPosyandu');
Route::get('jadwalPosyandu/delete/{id_jadwal}', 'bidanController@destroyJadwalPosyandu')->name('deleteJadwalPosyandu');

//Vitamin A
Route::get('imunisasiDanvitaminA', 'bidanController@vitaminA')->name('imunisasiDanvitaminA');
Route::get('vitaminA/create', 'bidanController@createVitaminA')->name('createVitaminA');
Route::post('vitaminA/store', 'bidanController@storeVitaminA')->name('storeVitaminA');
Route::get('vitaminA/edit/{id_vitaminA}', 'bidanController@editVitaminA')->name('editVitaminA');
Route::post('vitaminA/update/{id_vitaminA}', 'bidanController@updateVitaminA')->name('updateVitaminA');
Route::get('vitaminA/delete/{id_vitaminA}', 'bidanController@destroyVitaminA')->name('deleteVitaminA');

//Data Imunisasi Vaksin
Route::get('imunisasi/create', 'bidanController@createImunisasi')->name('createImunisasi');
Route::post('imunisasi/store', 'bidanController@storeImunisasi')->name('storeImunisasi');
Route::get('imunisasi/edit/{id_imunisasi}', 'bidanController@editImunisasi')->name('editImunisasi');
Route::post('imunisasi/update/{id_imunisasi}', 'bidanController@updateImunisasi')->name('updateImunisasi');
Route::get('imunisasi/delete/{id_imunisasi}', 'bidanController@destroyImunisasi')->name('deleteImunisasi');

//Jenis Vaksin Imunisasi
Route::get('jenisVaksinImunisasi', 'bidanController@jenisVaksinImunisasi')->name('jenisVaksinImunisasi');
Route::get('jenisVaksinImunisasi/create', 'bidanController@createJenisVaksinImunisasi')->name('createJenisVaksinImunisasi');
Route::post('jenisVaksinImunisasi/store', 'bidanController@storeJenisVaksinImunisasi')->name('storeJenisVaksinImunisasi');
Route::get('jenisVaksinImunisasi/edit/{id_vaksin_imunisasi}', 'bidanController@editJenisVaksinImunisasi')->name('editJenisVaksinImunisasi');
Route::post('jenisVaksinImunisasi/update/{id_vaksin_imunisasi}', 'bidanController@updateJenisVaksinImunisasi')->name('updateJenisVaksinImunisasi');
Route::get('jenisVaksinImunisasi/delete/{id_vaksin_imunisasi}', 'bidanController@destroyJenisVaksinImunisasi')->name('deleteJenisVaksinImunisasi');

//jadwal posyandu halaman ibu bayi
Route::get('jadwalPosyanduibuBayi', 'ibuBayiController@jadwalPosyandu')->name('jadwalPosyanduBayi');
Route::get('konsultasiIbu', 'ibuBayiController@konsultasi')->name('konsultasiIbu');
Route::get('konsultasiIbu/createKonsultasi', 'ibuBayiController@createKonsultasi')->name('createKonsultasi');
Route::post('konsultasiIbu/storeKonsultasi', 'ibuBayiController@storeKonsultasi')->name('storeKonsultasi');

//Konsultasi bidan
Route::get('konsultasi', 'bidanController@konsultasi')->name('konsultasi');
Route::get('konsultasi/balas/{id_kosultasi}', 'bidanController@balasKonsultasi')->name('balasKonsultasi');
Route::post('konsultasi/updatebalas/{id_kosultasi}', 'bidanController@updateKonsultasi')->name('updateKonsultasi');
Route::get('konsultasi/delete/{id_kosultasi}', 'bidanController@destroyKonsultasi')->name('deleteKonsultasi');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//halaman user tanpa login
Route::get('/index', 'GuestController@index')->name('index');
Route::get('/about', 'GuestController@about')->name('about');
Route::get('/jadwal', 'GuestController@jadwal')->name('jadwal');
Route::get('/penyuluhanGuest', 'GuestController@penyuluhan')->name('penyuluhanGuest');
Route::get('/login', 'loginController@index')->name('login');
