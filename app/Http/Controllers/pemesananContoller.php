<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pemesananContoller extends Controller
{
    //
    public function index(){
        return view ('konten/transaksi/pemesanan');
    }

    public function input(){
        return view ('konten/transaksi/inputPemesanan');
    }
}
