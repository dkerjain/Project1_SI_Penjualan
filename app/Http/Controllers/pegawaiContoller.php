<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class pegawaiContoller extends Controller
{
    //
    public function index(){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            $pegawai = DB::table('pegawai')
            ->join('jabatan', 'jabatan.id_jabatan', '=', 'pegawai.id_jabatan')
            ->get();
            $jabatan = DB::table('jabatan')->get();
            return view ('konten/master/pegawai', compact('pegawai', 'jabatan'));
        }
    }

    public function store(Request $request){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            DB::table('pegawai')->insert([
                'id_pegawai' => IdGenerator::generate(['table' => 'pegawai', 'field' => 'id_pegawai', 'length' => 4, 'prefix' => 'P']),
                'nama_pegawai' => $request->nama,
                'id_jabatan' => $request->jabatan,
                'alamat_pegawai' => $request->alamat,
                'no_tlp' => $request->no,
                'jenis_kelamin' => $request->jk,
                'username' => $request->username,
                'pasword' => $request->pasword
            ]);
            return back();
        }
    }

    public function edit(Request $request, $id){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            DB::table('pegawai')->where('id_pegawai', $id)->update([
                'nama_pegawai' => $request->nama,
                'id_jabatan' => $request->jabatan,
                'alamat_pegawai' => $request->alamat,
                'no_tlp' => $request->no,
                'jenis_kelamin' => $request->jk,
                'username' => $request->username,
                'pasword' => $request->pasword
            ]);
            return back();
        }
    }
}
