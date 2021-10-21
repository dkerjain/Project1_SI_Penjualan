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

Route::get('/index','indexController@index');

//Barang
Route::get('/dataBarang','barangContoller@index');

//Pegawai
Route::get('/dataPegawai','pegawaiContoller@index');

//Ketgori
Route::get('/dataKategori','kategoriContoller@index');

//Jabatan
Route::get('/dataJabatan','jabatanContoller@index');

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