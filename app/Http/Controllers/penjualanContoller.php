<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class penjualanContoller extends Controller
{
    //
    public function index(){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            return view ('konten/transaksi/penjualan');
        }
    }

    public function input(){
        return view ('konten/transaksi/inputPenjualan');
    }
}
