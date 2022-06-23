<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Operator;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Requests\PeminjamanRequest;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $operator = Auth::user()->name;
        $data = Peminjaman::latest()->with('barang')->paginate(5);
        return view('peminjaman.peminjaman', compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        // $operator = Operator::all();
        // $operator = Auth::user()->name;
        return view('peminjaman.tambahpeminjaman', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kode_barang_id' => 'required',
            'barang_id' => 'required',
            'nama_peminjam' => 'required',
            'status_peminjam' => 'required',
            'jumlah_pinjam' => 'required',
            'status' => 'required',
            'keterangan' => 'required',
        ]);

        $data = Peminjaman::create($request->all());

        return redirect('peminjaman')->with('success', 'data berhasil ditambahkan');
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
        // $operator = Operator::all();
        $data = Peminjaman::find($id);
        return view('peminjaman.editpeminjaman', compact('data', 'barang'));
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
        $data = Peminjaman::findorfail($id);
        $data -> update($request->all());

        return redirect('pengembalian')->with('success', 'data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Peminjaman::findorfail($id);
        $data->delete();

        return redirect('peminjaman')->with('destroy', 'data berhasil didelete');
    }

    public function searchp(Request $request){

        if($request->ajax()){
    
            $data= Peminjaman::where('nama_peminjam','like','%'.$request->search.'%')
            ->orwhere('status_peminjam','like','%'.$request->search.'%')
            ->orwhere('operator_id','like','%'.$request->search.'%')
            ->orwhere('nama_kelas','like','%'.$request->search.'%')->get();
    
    
            $output= "";
        if(count($data)>0){
    
            foreach($data as $data){
                $output.='
                <tr>  
                <td> '.$data->id.' </td>     
                <td> '.$data->barang->kode_barang.' </td>                
                <td> '.$data->barang->nama_barang.' </td>
                <td> '.$data->nama_peminjam.' </td>
                <td> '.$data->status_peminjam.' </td>
                <td> '.$data->operator->nama_op.' </td>
                <td> '.$data->nama_kelas.' </td>
                <td> '.$data->jumlah_pinjam.' </td>
                <td> '.$data->status.' </td>
                <td> '.$data->keterangan.' </td>
                <td>
                '.'
                <a href="" class="btn btn-warning">'.'<i class="fas fa-edit"></i></a>
                '.'
                    </td>
                </tr>';

            }
             
        }
    
        return response($output);
    
        }
    
      }
}
