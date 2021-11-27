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

            $pemeriksaan = DB::table('pemeriksaan')->get();
            
            
            $pemesanan   = DB::table('pemesanan')->join('pegawai as p','pemesanan.id_pegawai','p.id_pegawai')
                           ->join('pembayaran as pb','pemesanan.id_pemesanan','pb.id_pemesanan')
                           ->join('pemeriksaan as pm','pemesanan.id_pemeriksaan','pm.id_pemeriksaan')
                           ->select('pemesanan.*','p.*','pb.*','pm.*')
                           ->groupBy('pb.id_pemesanan')
                           ->get();
            $detail      = DetailPemesanan::join('barang as b','detail_pemesanan.id_barang','b.id_barang')->get();
            return view ('konten/transaksi/pemesanan')->with(compact('pemeriksaan','pemesanan','detail'));
        }
    }

    public function input(Request $request, $id){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
         
            $pemeriksaan = $id;
            // dd($pemeriksaan);

            $barang      = Barang::join('kategori as k','barang.id_kategori','k.id_kategori')->get();
           
            return view ('konten/transaksi/inputPemesanan',['pemeriksaan'=>$pemeriksaan, 'barang'=>$barang]);
        }
    }

    public function store(Request $request){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{

            $tgl = Carbon::now()->format('Y-m-d h:i:s');
            DB::table('pemesanan')->insert([
                'id_pegawai'                => Session::get('id_pegawai'),
                'id_pemeriksaan'            => $request->pemeriksaan,
                'tanggal_pemesanan'         => $request->tgl_pemesanan,
                'tanggal_selesai_pemesanan' => $request->tgl_selesai,
                'total_biaya'               => $request->total,
                'status_barang'             => 0
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


    public function ubahSatusOrder(Request $request){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            DB::table('pemesanan')->update([
                'status_barang'             => 1
            ]);
            return redirect('/pemesanan')->with('success','success'); 
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
                    'jumlah_bayar'          => $request->total_bayar,
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

    public function notapemesanan($id){
        $pemesanan = DB::table('pemesanan')
        ->where('id_pemesanan', $id)->get();
        $pegawai = DB::table('pegawai')->get();
        $pemeriksaan = DB::table('pemeriksaan')->get();
        $detail_pemesanan = DB::table('detail_pemesanan')->get();
        $barang = DB::table('barang')->get();
        
        $pdf = \PDF::loadview('/konten/transaksi/notapemesanan', compact('pemesanan','pemeriksaan', 'id', 'pegawai', 'detail_pemesanan', 'barang'))->setPaper('A5');
        return $pdf->stream('NOTA'.$id.'.pdf');

    }

    public function nonAktif(Request $request, $id){
        DB::table('pemesanan')->where('id_pemesanan',$id)->update([
            'status_pemesanan' => 2,
            ]);
            return redirect('/pemesanan')->with('delete','delete');

    }
}
