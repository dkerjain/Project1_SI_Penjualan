<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\CarbonPeriode;

class laporanContoller extends Controller
{
    //
    public function index(){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            $penjualan = DB::table('penjualan')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'penjualan.id_pegawai')
            ->join('detail_penjualan', 'detail_penjualan.id_penjualan', '=', 'penjualan.id_penjualan')
            ->join('barang', 'barang.id_barang', '=', 'detail_penjualan.id_barang')
            ->get();
            return view ('konten/transaksi/laporan', compact('penjualan'));
        }
    }

    public function report(){
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        //DAN ENDOFMONTH UNTUK MENGAMBIL TANGGAL TERAKHIR DIBULAN YANG BERLAKU SAAT INI
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        //JIKA USER MELAKUKAN FILTER MANUAL, MAKA PARAMETER DATE AKAN TERISI
        if (request()->date != '') {
            //MAKA FORMATTING TANGGALNYA BERDASARKAN FILTER USER
            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:00';
            $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
        }

        $penjualan = DB::table('penjualan')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'penjualan.id_pegawai')
            ->join('detail_penjualan', 'detail_penjualan.id_penjualan', '=', 'penjualan.id_penjualan')
            ->join('barang', 'barang.id_barang', '=', 'detail_penjualan.id_barang')
            ->whereBetween('penjualan.tanggal_penjualan', [$start, $end])
            ->get();

        // $user = DB::table('user')->get();
        // $pengeluaran_bulanan = DB::table('pengeluaran_bulanan')->whereBetween('TGL_PENGELUARAN', [$start, $end])->get();
        // $jenis_pengeluaran = DB::table('jenis_pengeluaran')->get();

            return view('konten/transaksi/laporan')->with(compact('penjualan'));
    }

    public function laporanPiutang(){
        
        if(!Session::get('/Login')){
            return redirect('/');
        }else{        
            $pemesanan = DB::table('pemesanan')
            ->join('pembayaran', 'pembayaran.id_pemesanan', '=', 'pemesanan.id_pemesanan')
            ->join('pemeriksaan', 'pemeriksaan.id_pemeriksaan', '=', 'pemesanan.id_pemeriksaan')
            ->where('pemesanan.status_pembayaran', '=', '1')
            ->get();
            return view('konten/transaksi/laporanPiutang', compact('pemesanan'));
        }
    }

    public function reportPiutang(){
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        //DAN ENDOFMONTH UNTUK MENGAMBIL TANGGAL TERAKHIR DIBULAN YANG BERLAKU SAAT INI
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        //JIKA USER MELAKUKAN FILTER MANUAL, MAKA PARAMETER DATE AKAN TERISI
        if (request()->date != '') {
            //MAKA FORMATTING TANGGALNYA BERDASARKAN FILTER USER
            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:00';
            $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
        }

        $pemesanan = DB::table('pemesanan')
            ->join('pembayaran', 'pembayaran.id_pemesanan', '=', 'pemesanan.id_pemesanan')
            ->join('pemeriksaan', 'pemeriksaan.id_pemeriksaan', '=', 'pemesanan.id_pemeriksaan')
            ->where('pemesanan.status_pembayaran', '=', '1')
            ->whereBetween('pemesanan.tanggal_pemesanan', [$start, $end])
            ->get();

            return view('konten/transaksi/laporanPiutang')->with(compact('pemesanan'));
    }

    public function laporanPembayaran(){
        
        if(!Session::get('/Login')){
            return redirect('/');
        }else{        
            $pemesanan = DB::table('pemesanan')
            ->where('status_pembayaran', '=', '0')
            ->get();
            $pembayaran = DB::table('pembayaran')
            ->where('sisa', '=', '0')
            ->get();
            return view('konten/transaksi/laporanPembayaran', compact('pemesanan', 'pembayaran'));
        }
    }

    public function reportPembayaran(){
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        //DAN ENDOFMONTH UNTUK MENGAMBIL TANGGAL TERAKHIR DIBULAN YANG BERLAKU SAAT INI
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        //JIKA USER MELAKUKAN FILTER MANUAL, MAKA PARAMETER DATE AKAN TERISI
        if (request()->date != '') {
            //MAKA FORMATTING TANGGALNYA BERDASARKAN FILTER USER
            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:00';
            $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
        }

        $pemesanan = DB::table('pemesanan')
            ->where('status_pembayaran', '=', '0')
            ->whereBetween('pemesanan.tanggal_pemesanan', [$start, $end])
            ->get();
            $pembayaran = DB::table('pembayaran')
            ->where('sisa', '=', '0')
            ->get();

            return view('konten/transaksi/laporanPembayaran')->with(compact('pemesanan', 'pembayaran'));
    }
}
