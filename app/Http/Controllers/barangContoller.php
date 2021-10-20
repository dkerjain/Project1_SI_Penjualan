<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class barangContoller extends Controller
{
    //
    public function index(){
        return view ('konten/master/barang');
    }
}
