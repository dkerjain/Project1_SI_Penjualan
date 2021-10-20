<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jabatanContoller extends Controller
{
    //
    public function index(){
        return view ('konten/master/jabatan');
    }
}
