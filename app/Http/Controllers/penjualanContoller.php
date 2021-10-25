<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class penjualanContoller extends Controller
{
    //
    public function index(){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            $pegawai = DB::table('pegawai')->get();
            $barang = DB::table('barang')->get();
            $penjualan = DB::table('penjualan')->get();
            $detail_penjualan = DB::table('detail_penjualan')->get();
            return view ('konten/transaksi/penjualan',['barang'=>$barang, 'pegawai'=>$pegawai, 'penjualan'=>$penjualan, 'detail_penjualan'=>$detail_penjualan]);
        }
    }

    public function input(){
        $barang = DB::table('barang')->get();
        $kategori = DB::table('kategori')->get();
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            return view ('konten/transaksi/inputPenjualan',['barang'=>$barang, 'kategori'=>$kategori]);
        }
        
    }

    public function proses(Request $request){
        $start = Carbon::now()->format('Y-m-d').' 00:00:00';
        $end = Carbon::now()->format('Y-m-d').' 23:59:59';
        $tgl = Carbon::now()->format('Y-m-d h:i:s');
		$id = (DB::table('penjualan')->whereBetween('tanggal_penjualan', [$start, $end])->count('id_penjualan'))+1;
		$d = date('d');
        $m = date('m');
        $y = date('y');
        $nota_id = str_pad($y,2,"0",STR_PAD_LEFT).str_pad($m,2,"0",STR_PAD_LEFT).str_pad($d,2,"0",STR_PAD_LEFT).str_pad($id,2,"0",STR_PAD_LEFT);
        
            DB::table('penjualan')->insert([
	            'id_penjualan'   => $nota_id,
	            'id_pegawai' => $request->userid,
                'tanggal_penjualan' => $tgl,
                'total_harga'=> $request->total
        	]);
            foreach ($request['id'] as $key) {
		            DB::table('detail_penjualan')->insert([
		            'id_penjualan'   => $nota_id,
		            'id_barang'  => $key,
		            'jumlah_pembelian' => $request['qty'][$key],
		            'sub_total_harga'=> $request['subtotal'][$key]
	            ]);
            }

        $id = (DB::table('pembayaran')->whereBetween('tanggal_pembayaran', [$start, $end])->count('id_pembayaran'))+1;
        $d = date('d');
        $m = date('m');
        $y = date('y');
        $bayar_id = str_pad($y,2,"0",STR_PAD_LEFT).str_pad($m,2,"0",STR_PAD_LEFT).str_pad($d,2,"0",STR_PAD_LEFT).str_pad($id,2,"0",STR_PAD_LEFT);
            
            DB::table('pembayaran')->insert([
                'id_pembayaran' => $bayar_id,
                'id_pegawai' => $request->userid,
                'id_penjualan' => $nota_id,
                'tanggal_pembayaran' => $tgl,
                'total_bayar' => $request->total,
                'jumlah_bayar' => $request->total
            ]);
        
        return redirect('penjualan'); 
    }
}
