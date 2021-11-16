<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class jabatanContoller extends Controller
{
    //
    public function index(){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            $jabatan = DB::table('jabatan')->get();
            return view ('konten/master/jabatan', compact('jabatan'));
        }
    }

    public function store(Request $request){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            DB::table('jabatan')->insert([
                'id_jabatan' => IdGenerator::generate(['table' => 'jabatan', 'field' => 'id_jabatan', 'length' => 4, 'prefix' => 'J']),
                'nama_jabatan' => $request->nama
            ]);
            return back()->with('success','success');
        }
    }

    public function edit(Request $request, $id){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            DB::table('jabatan')->where('id_jabatan', $id)->update([
                'nama_jabatan' => $request->nama
            ]);
            return back()->with('update','update');
        }
    }

    public function hapus(Request $request, $id){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            DB::table('jabatan')->where('id_jabatan', $id)->delete();
            return back()->with('delete','delete');
        }
    }
}
