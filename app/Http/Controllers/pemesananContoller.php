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
use App\Models\Pembayaran;

class pemesananContoller extends Controller
{
    //
    public function index(){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{

            $pemeriksaan = Pemeriksaan::all();
            $pemesanan   = DB::table('pemesanan')->join('pegawai as p','pemesanan.id_pegawai','p.id_pegawai')
                           ->join('pembayaran as pb','pemesanan.id_pemesanan','pb.id_pemesanan')->get();
            $detail      = DetailPemesanan::join('barang as b','detail_pemesanan.id_barang','b.id_barang')->get();
            return view ('konten/transaksi/pemesanan')->with(compact('pemeriksaan','pemesanan','detail'));
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

    public function store(Request $request){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{

            $tgl = Carbon::now()->format('Y-m-d h:i:s');
            DB::table('pemesanan')->insert([
                'id_pegawai'            => Session::get('id_pegawai'),
                'id_pemeriksaan'        => $request->pemeriksaan,
                'tanggal_pemesanan'     => $request->tgl_pemesanan,
                'total_biaya'           => $request->total
            ]);

            $ID_PEMESANAN = DB::table('pemesanan')->max('id_pemesanan');
            foreach ($request['id'] as $key) {
                DB::table('detail_pemesanan')->insert([
                    'id_barang'             => $key,
                    'id_pemesanan'          => $ID_PEMESANAN,
                    'ukuran_lensa'          => $request->ukuran_lensa[$key],
                    'jenis_lensa'           => $request->jenis_lensa[$key],
                    'harga_kacamata'        => $request->subtotal[$key],
                    'jumlah_pemesanan'      => $request->qty[$key]
                ]);
            }

            DB::table('pembayaran')->insert([
                'id_pegawai'            => Session::get('id_pegawai'),
                'id_pemesanan'          => $ID_PEMESANAN,
                'tanggal_pembayaran'    => $tgl,
                'total_bayar'           => $request->total,
                'jumlah_bayar'          => $request->bayar,
                'sisa'                  => $request->sisa
            ]);

            return redirect('pemesanan')->with('success','success'); 
        }
    }

    public function tambahpembayaran(Request $request){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{

           $query = DB::table('pemesanan')->where('id_pemesanan',$request->id_pemesanan)->value('status_pembayaran','=','1');

            if($query){
                DB::table('pemesanan')->where('id_pemesanan',$request->id_pemesanan)->update([
                    'status_pemesanan'  => 0,
                    'status_pembayaran' => 0
                ]);

                $tgl = Carbon::now()->format('Y-m-d h:i:s');
                
                DB::table('pembayaran')->insert([
                    'id_pegawai'            => Session::get('id_pegawai'),
                    'id_pemesanan'          => $request->id_pemesanan,
                    'tanggal_pembayaran'    => $tgl,
                    'total_bayar'           => $request->total_bayar,
                    'jumlah_bayar'          => $request->jumlah,
                    'sisa'                  => 0
                ]);
            }
            else{
                DB::table('pemesanan')->where('id_pemesanan',$request->id_pemesanan)->update([
                    'status_pemesanan'  => 1,
                    'status_pembayaran' => 1
                ]);
            }
            return redirect('/pemesanan')->with('update','success');
        }
    }
}
