@extends('layoutnya')
@section('judul','Detail Inventory')
@section('isi')
 
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <a href="{{ url('inventory') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
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
                            <img src="data:image/png;base64,{{\DNS2D::getBarcodePNG( $data->barang->kode_barang, 'QRCODE')}}" alt="barcode" style="width: 80px;" class="mb-3"/></td>
                            <th>Nama Barang</th>
                            <td>:</td>
                            <td>{{ $data->barang->nama_barang }}</td>
                        </tr>
                        <tr>
                            <th>Stock Barang</th>
                            <td>:</td>
                            <td>{{ $data->stock }}</td> 
                            <th>Jumlah Tersedia</th>
                            <td>:</td>
                            <td>{{ $data->jumlah_tersedia }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Rusak</th>
                            <td>:</td>
                            <td>{{ $data->jumlah_rusak }}</td> 
                            <th>Update At</th>
                            <td>:</td>
                            <td>{{ $data->updated_at->isoFormat('dddd, D MMMM Y, hh:mm:ss'); }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Pinjam</th>
                            <td>:</td>
                            <td>{{ $data->jumlah_pinjam }}</td>
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