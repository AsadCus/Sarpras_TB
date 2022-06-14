<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function main(){
        // $jmlsedia = Inventory::count('stock');
        $jmlpeminjam = Peminjaman::where('status','Dipinjam')->count();
        $jmlkembali = Peminjaman::where('status','Dikembalikan')->count();
        $namapeminjam = Peminjaman::all();
<<<<<<< HEAD
        $datainventory = Inventory::with('barang')->paginate();

        return view('layout.main',compact('jmlsedia','jmlpeminjam','jmlkembali','namapeminjam','datainventory'));
=======
        return view('layout.main',compact('jmlpeminjam','jmlkembali','namapeminjam'));
>>>>>>> d8c1995958abcf575f6af24697af95c95c797a5f
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
