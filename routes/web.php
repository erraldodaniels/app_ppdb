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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/kategori','KategoriController@index');
Route::post('/kategori/store','KategoriController@store');
Route::post('/kategori/update','KategoriController@update');
Route::get('/kategori/edit/{id_kategori}','KategoriController@edit');


Route::get('/user','UserController@index');
Route::post('/user/store','UserController@store');
Route::post('/user/update','UserController@update');
Route::get('/user/edit/{id}','UserController@edit');

Route::get('/kasir','UserController@index2');
Route::post('/kasir/store','UserController@store2');
Route::post('/kasir/update','UserController@update2');
Route::get('/kasir/edit/{id}','UserController@edit2');
Route::get('/kasir/delete/{id}', 'UserController@delete2');

Route::get('/anggota','UserController@indexAnggota');
Route::post('/anggota/store','UserController@storeAnggota');
Route::get('/anggota/delete/{id}','UserController@deleteAnggota');
Route::get('/anggota/edit/{id}','UserController@editAnggota');
Route::post('/anggota/update','UserController@updateAnggota');
Route::get('/anggota/topup/{id}','UserController@topupSaldo');
Route::post('/anggota/updatesaldo','UserController@updateSaldo');

Route::get('/barang','BarangController@index');
Route::get('/cetak','BarangController@cetak');
Route::get('/barang/barcode_satuan/{id_barang}','BarangController@barcode_satuan');
Route::post('/barang/store','BarangController@store');
Route::post('/barang/update','BarangController@update');
Route::get('/barang/edit/{id_barang}','BarangController@edit');
Route::get('/barang/hapus/{id_barang}','BarangController@hapus');

Route::get('/pasok','PasokController@index');
Route::post('/pasok/store','PasokController@store');
Route::post('/pasok/update','PasokController@update');
Route::get('/pasok/edit/{id_pasok}','PasokController@edit');

Route::get('/ambil','TransaksiController@ambil');
Route::get('/ambil2','TransaksiController@ambil2');

Route::get('/transaksi','TransaksiController@index');

Route::get('/nyokot','TransaksiController@nyokot');
Route::get('/getIdCard','TransaksiController@getIdCard');
Route::get('/nyokot2/{id}','TransaksiController@nyokot2');
Route::get('/hapus/{id}','TransaksiController@hapusitem');
Route::post('/masuk/sementara','TransaksiController@store');
Route::post('/masuk/semua','TransaksiController@storesemua');
Route::get('/cetak/{kode_transaksi}','TransaksiController@cetak');

Route::get('/cetakexcel','LaporanController@export')->name('export.excel');
Route::get('/laporan','LaporanController@index');
Route::get('/laporan/{kode_transaksi_kembalian}','LaporanController@detail');

Route::get('change-password', 'ChangePasswordController@index');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

Route::get('/referensi', 'UserController@indexReferensi');
Route::post('/referensi/add', 'UserController@addReferensi');
//Route::get('/profile', 'ProfileController@index');
//Route::post('/profile/login', 'ProfileController@login');
//Route::get('/profile/auth', 'ProfileController@cekAuth');

