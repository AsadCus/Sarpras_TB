<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Exports\PeminjamanExport;
use Maatwebsite\Excel\Facades\Excel;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Peminjaman::latest()->with('barang','operator')->paginate(10);
        return view('pengembalian.pengembalian', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchpengembalian(Request $request){

        if($request->ajax()){
    
            $data= Peminjaman::where('nama_peminjam','like','%'.$request->search.'%')
            ->orwhere('status_peminjam','like','%'.$request->search.'%')
            ->orwhere('nama_kelas','like','%'.$request->search.'%')->get();
    
    
            $output= "";
        if(count($data)>0){
    
            foreach($data as $data){
                $output.='
                <tr>  
                <td> '.$data->id.' </td>                     
                <td> '.$data->barang->nama_barang.' </td>
                <td> '.$data->nama_peminjam.' </td>
                <td> '.$data->status_peminjam.' </td>
                <td> '.$data->operator->nama_op.' </td>
                <td> '.$data->nama_kelas.' </td>
                <td> '.$data->jumlah_pinjam.' </td>
                <td> '.$data->keterangan.' </td>
                </tr>';

            }
             
        }
    
        return response($output);
    
        }
    
    }

    public function exportexcelpeminjaman(){
        return Excel::download(new PeminjamanExport, 'datapengembalian.xlsx');
    }
}
