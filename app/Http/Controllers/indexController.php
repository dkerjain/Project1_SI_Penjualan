<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class indexController extends Controller
{
    //
    public function index(){
        $start = Carbon::now()->format('Y-m-d '.'00:00:00');
        $end = Carbon::now()->format('Y-m-d '.'23:59:59');

        $totalpenjualan = DB::table('penjualan')->COUNT('id_penjualan');
        $totalpemesanan = DB::table('pemesanan')->COUNT('id_pemesanan');
        $totalpemasukan = DB::table('pembayaran')->whereBetween('tanggal_pembayaran', [$start, $end])->SUM('jumlah_bayar');
        $totalpiutang = DB::table('pemesanan')->join('pembayaran', 'pemesanan.id_pemesanan', '=', 'pembayaran.id_pemesanan')
                        ->where('pemesanan.status_pembayaran','=','1')
                        ->sum('pembayaran.sisa');
        
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            return view ('konten/dashboard',[
                'totalpenjualan'=>$totalpenjualan,
                'totalpemesanan'=>$totalpemesanan,
                'totalpemasukan'=>$totalpemasukan,
                'totalpiutang' => $totalpiutang
            ]);
        }
    }
}
