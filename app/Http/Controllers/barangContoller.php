<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class barangContoller extends Controller
{
    //
    public function index(){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            $barang = DB::table('barang')
            ->join('kategori', 'kategori.id_kategori', '=', 'barang.id_kategori')
            ->get();
            $kategori = DB::table('kategori')->get();
            return view ('konten/master/barang', compact('barang', 'kategori'));
        }
    }

    public function store(Request $request){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            if($request->foto)
            {
                $foto = $request->file('foto');
                $path = '/Foto_Barang/'.time().'-'.$foto->getClientOriginalName();
                // dd($path);
                $foto->move(public_path('Foto_Barang'), $path);
            }else{
                $path = null;
            }

            DB::table('barang')->insert([
                'id_barang' => IdGenerator::generate(['table' => 'barang', 'field' => 'id_barang', 'length' => 4, 'prefix' => 'B']),
                'id_kategori' => $request->kategori,
                'nama_barang' => $request->nama,
                'harga_barang' => $request->harga,
                'stok_barang' => $request->stok,
                'foto_barang' => $path,
                'deskripsi_barang' => $request->deskripsi
            ]);
            return back()->with('success','success');
        }
    }

    public function edit(Request $request, $id){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            $path = null;
            if($request->foto)
            {
                $path = '/Foto_Barang/'.time().'-'.$request->foto->getClientOriginalName();
                $request->foto->move(public_path('Foto_Barang'), $path);       
            }   
            else{
                $path = $request->foto2;
            }

            DB::table('barang')->where('id_barang', $id)->update([
                'id_kategori' => $request->kategori,
                'nama_barang' => $request->nama,
                'harga_barang' => $request->harga,
                'stok_barang' => $request->stok,
                'foto_barang' => $path,
                'deskripsi_barang' => $request->deskripsi
            ]);
            return back()->with('update','update');
        }
    }
    public function hapus(Request $request, $id){
        if(!Session::get('/Login')){
            return redirect('/');
        }else{
            DB::table('barang')->where('id_barang', $id)->delete();
            return back()->with('delete','delete');
        }
    }
}
