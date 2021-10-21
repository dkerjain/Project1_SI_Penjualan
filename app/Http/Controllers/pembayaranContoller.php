<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pembayaranContoller extends Controller
{
    //

    //menampilkan data pembayaran
    public function index(){
        return view ('konten/transaksi/pembayaran');
    }
}
