<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operator= Operator::paginate(5);
        return view('Operator.operator',compact('operator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Operator.create');
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
        //     'nama_op' => 'required',
        // ]);

        Operator::create([
            'nama_op' => $request->nama_op,
        ]);

        return Redirect('/operator')->with('success', 'Data Operator berhasil Ditambahkan');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operator = Operator::findorfail($id);
        return view('Operator.edit',compact('operator'));
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
        $operator = Operator::findorfail($id);
        $operator -> update($request->all());
        return redirect('/operator')->with('success', "Data Operator Berhasil Di Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $operator = Operator::findorfail($id);
        $operator->delete();
        return back()->with('destroy', "Data Barang Berhasil Di Delete");
    }

    public function searchop(Request $request){

        if($request->ajax()){
    
            $operator= operator::where('nama_op','like','%'.$request->search.'%')->get();
    
    
            $output= "";
        if(count($operator)>0){
    
            
            foreach($operator as $operator){
                $output.='
                <tr>  
                <td> '.$operator->id.' </td>                     
                <td> '.$operator->nama_op.' </td>
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
