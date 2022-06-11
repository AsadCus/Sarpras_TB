<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function main(){
        return view('layout.main');
    }

    public function kunci(){
        return view('master.kunci');
    }
    
    public function barang(){
        return view('master.barang');
    }

    public function inventory(){
        return view('inventory.inventory');
    }

    public function pinjam_guru(){
        return view('peminjaman.guru');
    }
    
    public function pinjam_siswa(){
        return view('peminjaman.siswa');
    }
}