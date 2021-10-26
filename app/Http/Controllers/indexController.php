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

    public function profile(){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            $pegawai = DB::table('pegawai')->where('id_pegawai', Session::get('id_pegawai'))->get();
            return view('profile', compact('pegawai'));
        }
    }

    public function editProfile(Request $request){
       DB::table('pegawai')->where('id_pegawai', Session::get('id_pegawai'))->update([
        'nama_pegawai' => $request->nama,
        'alamat_pegawai' => $request->alamat,
        'jenis_kelamin' => $request->jk,
        'no_tlp' => $request->no,
        'username' => $request->username,
        'pasword' => $request->pasword
       ]);
       return redirect('/index');
    }
}
