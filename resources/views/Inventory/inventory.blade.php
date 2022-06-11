@extends('layoutnya')
@section('judul','Inventory')
@section('isi')
<div class="card">
    <div class="card-body">
        <a href="{{ url('inventory/create') }}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-plus"></i><span class="px-2">Tambah</span></a>
        <table class="table table-hover table-responsive table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Jumlah Tersedia</th>
                    <th scope="col">Jumlah Rusak</th>
                    <th scope="col">Jumlah Terpinjam</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Proyektor AXYT-1</td>
                    <td>2</td>
                    <td>BAIK</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                    <td>
                        <a href="#" class="btn btn-icon btn-warning mt-1"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-icon btn-danger mt-1 "><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
