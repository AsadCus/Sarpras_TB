<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index(){
        $data = BarangKeluar::latest()->with('barang')->paginate(5);
        return view('', compact('data'));
    }
}
