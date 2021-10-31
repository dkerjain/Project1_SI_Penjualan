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
Route::get('/profile','indexController@profile');
Route::post('/editProfile','indexController@editProfile');

//Barang
Route::get('/dataBarang','barangContoller@index');
Route::post('/tambahBarang','barangContoller@store');
Route::post('/editBarang/{id}','barangContoller@edit');
Route::get('/hapusBarang/{id}','barangContoller@hapus');

//Pegawai
Route::get('/dataPegawai','pegawaiContoller@index');
Route::post('/tambahPegawai','pegawaiContoller@store');
Route::post('/editPegawai/{id}','pegawaiContoller@edit');
Route::get('/hapusPegawai/{id}','pegawaiContoller@hapus');

//Ketgori
Route::get('/dataKategori','kategoriContoller@index');
Route::post('/tambahKategori','kategoriContoller@store');
Route::post('/editKategori/{id}','kategoriContoller@edit');
Route::get('/hapusKategori/{id}','kategoriContoller@hapus');

//Jabatan
Route::get('/dataJabatan','jabatanContoller@index');
Route::post('/tambahJabatan','jabatanContoller@store');
Route::post('/editJabatan/{id}','jabatanContoller@edit');
Route::get('/hapusJabatan/{id}','jabatanContoller@hapus');

//Penjualan
Route::get('/penjualan','penjualanContoller@index');
Route::get('/inputPenjualan','penjualanContoller@input');
Route::post('/inputPenjualan/submit','penjualanContoller@proses');
Route::get('/notaPenjualan/{id}','penjualanContoller@notaPenjualan');

//Pemeriksaan
Route::get('/pemeriksaan','pemeriksaanContoller@index');
Route::post('/pemeriksaan/insert','pemeriksaanContoller@insert');
Route::post('/pemeriksaan/edit','pemeriksaanContoller@update');

//Pemesanan
Route::get('/pemesanan','pemesananContoller@index');
Route::get('/inputPemesanan','pemesananContoller@input');
Route::post('/pemesanan/inputPemesanan/submit','pemesananContoller@store');
Route::post('/pemesanan/tambahpembayaran','pemesananContoller@tambahpembayaran');
Route::get('/notaPemesanan/{id}','pemesananContoller@notapemesanan');

//Pembayaran
Route::get('/pembayaran','pembayaranContoller@index');

//Laporan
Route::get('/laporan','laporanContoller@index');
Route::get('/laporan/report','laporanContoller@report');
Route::get('/laporan/laporanPiutang','laporanContoller@laporanPiutang');
Route::get('/laporan/laporanPembayaran','laporanContoller@laporanPembayaran');