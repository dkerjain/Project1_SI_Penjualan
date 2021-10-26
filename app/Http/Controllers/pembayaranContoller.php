<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class pembayaranContoller extends Controller
{
    //

    //menampilkan data pembayaran
    public function index(){
        $pegawai = DB::table('pegawai')->get();
        $pembayaran = DB::table('pembayaran')->get();
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            return view ('konten/transaksi/pembayaran', ['pegawai'=>$pegawai, 'pembayaran'=>$pembayaran]);
        }
    }
}
