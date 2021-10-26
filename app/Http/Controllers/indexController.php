<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    //
    public function index(){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            return view ('konten/dashboard');
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
