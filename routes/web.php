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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('mahasiswa/beranda', 'MahasiswaController@beranda');
Route::get('form-daftar','MahasiswaController@formDaftar');
Route::post('simpan-daftar','MahasiswaController@simpanDaftar');
Route::get('hasil-daftar','MahasiswaController@hasilDaftar');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('registrasi/index','RegistrasiController@index');

    Route::get('user/index','UserController@index');
    Route::get('user/tambah','UserController@tambah');
    Route::post('user/simpan','UserController@simpan');

    Route::get('user/edit/{id}','UserController@edit');
    Route::post('user/update/{id}','UserController@update');

    Route::get('user/hapus/{id}','UserController@hapus');
});
Route::get('registrasi/index','RegistrasiController@index');
Route::get('registrasi/hapus/{id}','RegistrasiController@hapus');
Route::get('registrasi/syarat/{id}','RegistrasiController@syarat');
Route::get('registrasi/syarat-form/{id}','RegistrasiController@syaratForm');
Route::post('registrasi/syarat-simpan','RegistrasiController@syaratSimpan');