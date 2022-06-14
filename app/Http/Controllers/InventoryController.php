<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datainventory = Inventory::with('barang')->paginate(2);
        return view('inventory.inventory', compact('datainventory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $databarang = Barang::all();
        return view('inventory.tambahinventory', compact('databarang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Inventory::create($request->all());
        return redirect('/inventory')->with('success','Data Inventory Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $databarang = Barang::all();
        $inventory = Inventory::findorfail($id);
        return view('inventory.editinventory', compact('databarang','inventory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inventory = Inventory::findorfail($id);
        $inventory->update($request->all());
        return redirect('/inventory')->with('success','Data Inventory Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventory::findorfail($id);
        $inventory->delete();
        return redirect('inventory');
    }
    
    public function searching(Request $request){

        if($request->ajax()){
    
            $datainventory = Inventory::where('stock','like','%'.$request->search.'%')
            ->orwhere('jumlah_tersedia','like','%'.$request->search.'%')->get();
    
            $output= "";
        if(count($datainventory)>0){
    
            
            foreach($datainventory as $inventory){
                $output.='
                <tr>  
                <td> '.$inventory->id.' </td>                     
                <td> '.$inventory->barang->nama_barang.' </td>
                <td> '.$inventory->stock.' </td>
                <td> '.$inventory->jumlah_tersedia.' </td>
                <td> '.$inventory->jumlah_rusak.' </td>
                <td> '.$inventory->jumlah_pinjam.' </td>
                <td>
                '.'
                <a href="" class="btn btn-warning">'.'<i class="fas fa-edit"></i></a>
                '.'
                '.'
                <a href="" class="btn btn-danger">'.'<i class="fas fa-trash"></i></a>
                '.'
                    </td>
                </tr>';

            }
             
        }
    
        return response($output);
    
        }
    
      }
}