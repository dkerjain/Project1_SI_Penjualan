<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pembayaranContoller extends Controller
{
    //
    public function index(){
        return view ('konten/transaksi/pembayaran');
    }
}
