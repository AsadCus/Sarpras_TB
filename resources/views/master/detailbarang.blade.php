@extends('layoutnya')
@section('judul','Detail Barang')
@section('isi')
 
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <a href="{{ url('barang') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
                </p>
            </div>
            <div class="box-body">
               <div class="table-responsive">
                <table class="table table-stripped text-dark fw-bold">
                    <tbody>
                        <tr>
                            <th>Barcode</th>
                            <td>:</td>
                            <td>
                            <img src="data:image/png;base64,{{\DNS2D::getBarcodePNG($barang->kode_barang, 'QRCODE')}}" alt="barcode" style="width: 80px;" class="mb-3"/></td>
                            <th>Nama Barang</th>
                            <td>:</td>
                            <td>{{ $barang->nama_barang }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Barang</th>
                            <td>:</td>
                            <td>{{ $barang->jenis_barang }}</td> 
                            <th>Kode Barang</th>
                            <td>:</td>
                            <td>{{ $barang->kode_barang }}</td>
                        </tr>
                        <tr>
                            <th>Spesifikasi</th>
                            <td>:</td>
                            <td>{{ $barang->spesifikasi }}</td> 
                            <th>Created At</th>
                            <td>:</td>
                            <td>{{ $barang->created_at->isoFormat('dddd, D MMMM Y, hh:mm:ss'); }}</td>
                        </tr>
                        <tr>
                            <th>Foto Barang</th>
                            <td>:</td>
                            <td><img src="{{ asset('img/'.$barang->foto_barang) }}" alt="" style="width: 100px" class="mt-1"></td>
                        </tr>
                    </tbody>
                </table>
               </div>
               
            </div>
        </div>
    </div>
</div>
</div>
</div>
 
@endsection