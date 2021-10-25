<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\CarbonPeriode;
use App\Models\Pemeriksaan;
use App\Models\Pemesanan;
use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\DetailPemesanan;

class pemesananContoller extends Controller
{
    //
    public function index(){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{

            $pemeriksaan = Pemeriksaan::all();
            return view ('konten/transaksi/pemesanan',['pemeriksaan'=>$pemeriksaan]);
        }
    }

    public function input(){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{

            $pemeriksaan = Pemeriksaan::all();
            $barang      = Barang::join('kategori as k','barang.id_kategori','k.id_kategori')->get();
            return view ('konten/transaksi/inputPemesanan')->with(compact('pemeriksaan','barang'));
        }
    }
}
