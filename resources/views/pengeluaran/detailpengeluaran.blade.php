@extends('layoutnya')
@section('judul','Detail Peminjaman')
@section('isi')
 
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <a href="{{ url('pengeluaran') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
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
                            <a href="data:image/png;base64,{{\DNS2D::getBarcodePNG($barang->kode_barang, 'QRCODE')}}" download>
                            <img src="data:image/png;base64,{{\DNS2D::getBarcodePNG( $data->barang->kode_barang, 'QRCODE')}}" alt="barcode" style="width: 80px;" class="mb-3"/></td>
                            <th>Nama Barang</th>
                            <td>:</td>
                            <td>{{ $data->barang->nama_barang }}</td>
                        </tr>
                        <tr>
                            <th>Nama Peminta</th>
                            <td>:</td>
                            <td>{{ $data->nama_peminta }}</td> 
                            <th>Status Peminta</th>
                            <td>:</td>
                            <td>{{ $data->status_peminta }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Keluar</th>
                            <td>:</td>
                            <td>{{ $data->jumlah_keluar }}</td> 
                            <th>Keterangan</th>
                            <td>:</td>
                            <td>{{ $data->keterangan }}</td>
                        </tr>
                        <tr>
                            <th>Operator</th>
                            <td>:</td>
                            <td>{{ $data->operator_id }}</td>
                            <th>Waktu Barang Keluar</th>
                            <td>:</td>
                            <td>{{ $data->created_at->isoFormat('dddd, D MMMM Y, hh:mm:ss'); }}</td>
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