<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\CarbonPeriode;
use App\Models\Pemeriksaan;

class pemeriksaanContoller extends Controller
{
    //
    public function index(){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            $pemeriksaan = DB::table('pemeriksaan')->get();
            return view ('konten/transaksi/pemeriksaan',['pemeriksaan'=>$pemeriksaan]);
        }
    }

    public function insert(Request $request){
        if(!Session::get('/Login')){
            return redirect('/');
        }
        else{
            DB::table('pemeriksaan')->insert([
                'tanggal_pemeriksaan'   => $request->tgl_pemeriksaan,
                'nama_pelanggan'        => $request->nama,
                'alamat_pelanggan'      => $request->alamat,
                'no_telfon'             => $request->no_telfon,
                'hasil_pemeriksaan'     => $request->hasil_pemeriksaan
            ]);
            return redirect('/pemeriksaan')->with('success','success');
        }
    }

    public function update(Request $request){
        if(!Session::get('/Login')){
            return redirect('/');
        }
        else{
            $pemeriksaan = Pemeriksaan::all();

            Pemeriksaan::where('id_pemeriksaan',$request->id_pemeriksaan)->update([
                'hasil_pemeriksaan' => $request->hasil_pemeriksaan
            ]);
            return redirect('/pemeriksaan')->with('update','success');
        }
    }
}
