<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Inventory;
use App\Models\Operator;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function main(){
        $jmlsedia = Inventory::count('stock');
        $jmlpeminjam = Peminjaman::where('status','Dipinjam')->count();
        $jmlkembali = Peminjaman::where('status','Dikembalikan')->count(); 
        $jmlkeluar = BarangKeluar::count();
        $namapeminjam = Peminjaman::latest()->paginate(4);
        $datainventory = Inventory::with('barang')->paginate();
        return view('layout.main',compact('jmlsedia', 'jmlpeminjam','jmlkembali','namapeminjam','datainventory','jmlkeluar'));
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
