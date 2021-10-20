<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pegawaiContoller extends Controller
{
    //
    public function index(){
        return view ('konten/master/pegawai');
    }
}
