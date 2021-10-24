<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
  
class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginCek(Request $request)
    {
        $username = $request->username;
        $pasword = $request->pasword;

        $pegawai = DB::table('pegawai')
        ->join('jabatan', 'jabatan.id_jabatan', '=', 'pegawai.id_jabatan')
        ->where('username', $username)->first();
        if($pegawai){ 
            if($pegawai->pasword == $pasword){
                Session::put('id_pegawai', $pegawai->id_pegawai);
                Session::put('nama_pegawai', $pegawai->nama_pegawai);
                Session::put('id_jabatan', $pegawai->id_jabatan);
                Session::put('nama_jabatan', $pegawai->nama_jabatan);
                Session::put('/Login', TRUE);
                // if($user->jabatan_user == 0){
                //     Session::put('admin', TRUE);
                //     return redirect('/Home');
                // }elseif($user->jabatan_user == 2){
                //     Session::put('customer', TRUE);
                //     return redirect('/Pemesanan');
                // }elseif($user->jabatan_user == 1){
                //     Session::put('gudang', TRUE);
                //     return redirect('/Stok');
                // }
                return redirect('/index');
            }else{
                Session::flash('fpassword', 'Salah Memasukkan Password');
                return redirect('/');
            }
        }else{
            Session::flash('femail', 'Salah Memasukkan Username');
            return redirect('/');
        }
    }

    public function logoutCek()
    {
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            Session::flush();
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
