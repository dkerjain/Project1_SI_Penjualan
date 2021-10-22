<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class penjualanContoller extends Controller
{
    //
    public function index(){
        return view ('konten/transaksi/penjualan');
    }

    public function input(){
        return view ('konten/transaksi/inputPenjualan');
    }
}
