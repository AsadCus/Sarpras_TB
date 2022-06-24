<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Barryvdh\DomPDF\PDF;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Exports\BarangExport;
use App\Models\Inventory;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $barang= Barang::paginate(5);
        $data = Peminjaman::latest()->with('barang')->paginate(5);
        return view('master.barang',compact('barang', 'data'));
    }

    public function detail($id)
    {
        $barang = Barang::find($id);
        return view('master.detailbarang', compact('barang'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.tambahbarang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'nama_barang' => 'required',
        //     'jenis_barang' => 'required',
        //     'foto_barang' => 'required',
        // ]);

        $pt = $request->foto_barang;
        $ptFile = $pt->getClientOriginalName();
        $pt->move(public_path().'/img',$ptFile);
        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'spesifikasi' => $request->spesifikasi,
            'foto_barang' => $ptFile,
        ]);

        return Redirect('/barang')->with('success', 'Data Barang berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findorfail($id);
        return view('master.editbarang',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::findorfail($id);
        $barang -> update($request->all());
        if($request->hasFile('foto_barang')){
            $request->file('foto_barang')->move('img/', $request->file('foto_barang')->getClientOriginalName());
            $barang->foto_barang = $request->file('foto_barang')->getClientOriginalName();
            $barang -> save();
        }
        return redirect('/barang')->with('success', "Data Barang Berhasil Di Update");
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Barang::findorfail($id);
        $delete->delete();
        return back()->with('destroy', "Data Barang Berhasil Di Delete");
    }

    public function exportexcelbarang(){
        return Excel::download(new BarangExport, 'databarang.xlsx');
    }

    public function exportbarangAll(PDF $pdfCreator)
    {
        $barang = Barang::all();
        view()->share('barang', '$barang');
        $pdf = $pdfCreator->loadView('master.barangallpdf', ['barang' => $barang]);
        return $pdf->download('barang.pdf');
    }

    
}
