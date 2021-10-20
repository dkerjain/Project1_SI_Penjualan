<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kategoriContoller extends Controller
{
    //
    public function index(){
        return view ('konten/master/kategori');
    }
}
