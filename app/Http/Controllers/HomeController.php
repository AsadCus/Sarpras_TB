<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function main(){
        $jmlsedia = Inventory::where('stock')->count();
        $jmlpeminjam = Peminjaman::where('status','Dipinjam')->count();
        $jmlkembali = Peminjaman::where('status','Dikembalikan')->count();
        $namapeminjam = Peminjaman::all();
        return view('layout.main',compact('jmlsedia','jmlpeminjam','jmlkembali','namapeminjam'));
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
