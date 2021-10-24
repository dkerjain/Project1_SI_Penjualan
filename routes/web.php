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
Route::post('/tambahBarang','barangContoller@store');

//Pegawai
Route::get('/dataPegawai','pegawaiContoller@index');

//Ketgori
Route::get('/dataKategori','kategoriContoller@index');

//Jabatan
Route::get('/dataJabatan','jabatanContoller@index');

//Penjualan
Route::get('/penjualan','penjualanContoller@index');
Route::get('/inputPenjualan','penjualanContoller@input');

//Pemeriksaan
Route::get('/pemeriksaan','pemeriksaanContoller@index');

//Pemesanan
Route::get('/pemesanan','pemesananContoller@index');
Route::get('/inputPemesanan','pemesananContoller@input');

//Pembayaran
Route::get('/pembayaran','pembayaranContoller@index');

//Laporan
Route::get('/laporan','laporanContoller@index');