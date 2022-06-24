<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BarangKeluar::latest()->with('barang')->paginate(5);
        return view('pengeluaran.index', compact('data'));
    }

    public function detail($id)
    {
        $data = BarangKeluar::with('barang')->find($id);
        return view('pengeluaran.detailpengeluaran', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('pengeluaran.tambahpengeluaran', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // $this->validate($request, [
        //     'kode_barang_id' => 'required',
        //     'barang_id' => 'required',
        //     'nama_peminta' => 'required',
        //     'status_peminta' => 'required',
        //     'jumlah_keluar' => 'required',
        // ]);

        $data = BarangKeluar::create($request->all());

        return redirect('pengeluaran')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::all();
        $operator = User::all();
        $data = BarangKeluar::find($id);
        return view('pengeluaran.editpengeluaran', compact('data', 'barang', 'operator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $data = BarangKeluar::findorfail($id);
        $data->update($request->all());

        return redirect('/pengeluaran')->with('success', 'data berhasil diedit');
    }
}

