<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class kategoriContoller extends Controller
{
    //
    public function index(){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            $kategori = DB::table('kategori')->get();
            return view ('konten/master/kategori', compact('kategori'));
        }
    }

    public function store(Request $request){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            DB::table('kategori')->insert([
                'id_kategori' => IdGenerator::generate(['table' => 'kategori', 'field' => 'id_kategori', 'length' => 4, 'prefix' => 'K']),
                'jenis_kategori' => $request->nama
            ]);
            return back()->with('success','success');
        }
    }

    public function edit(Request $request, $id){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            DB::table('kategori')->where('id_kategori', $id)->update([
                'jenis_kategori' => $request->nama
            ]);
            return back()->with('update','update');
        }
    }

    public function hapus(Request $request, $id){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            DB::table('kategori')->where('id_kategori', $id)->delete();
            return back()->with('delete','delete');
        }
    }
}
