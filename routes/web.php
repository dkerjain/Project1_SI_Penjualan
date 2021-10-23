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
    return view('login');
});
Route::post('/loginCek','loginController@loginCek');
Route::get('/logoutCek','loginController@logoutCek');

Route::get('/index','indexController@index');

//Barang
Route::get('/dataBarang','barangContoller@index');
Route::post('/tambahBarang','barangContoller@store');
Route::post('/editBarang/{id}','barangContoller@edit');

//Pegawai
Route::get('/dataPegawai','pegawaiContoller@index');
Route::post('/tambahPegawai','pegawaiContoller@store');
Route::post('/editPegawai/{id}','pegawaiContoller@edit');

//Ketgori
Route::get('/dataKategori','kategoriContoller@index');
Route::post('/tambahKategori','kategoriContoller@store');
Route::post('/editKategori/{id}','kategoriContoller@edit');

//Jabatan
Route::get('/dataJabatan','jabatanContoller@index');
Route::post('/tambahJabatan','jabatanContoller@store');
Route::post('/editJabatan/{id}','jabatanContoller@edit');

//Penjualan
Route::get('/penjualan','penjualanContoller@index');

//Pemeriksaan
Route::get('/pemeriksaan','pemeriksaanContoller@index');

//Pemesanan
Route::get('/pemesanan','pemesananContoller@index');

//Pembayaran
Route::get('/pembayaran','pembayaranContoller@index');

//Laporan
Route::get('/laporan','laporanContoller@index');