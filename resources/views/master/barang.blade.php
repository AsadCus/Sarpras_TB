@extends('layoutnya')
@section('judul','Barang')
@section('isi')
<div class="card">
    <div class="card-body">
        <a href="{{ url('barang/create') }}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-plus"></i><span class="px-2">Tambah</span></a>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Foto Barang</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Proyektor AXYT-1</td>
                    <td>Barang Elektronik</td>
                    <td>proyektor.jpg</td>
                    <td>
                        <a href="#" class="btn btn-icon btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Kunci Ruang 1</td>
                    <td>Kunci</td>
                    <td>kunci1.jpg</td>
                    <td>
                        <a href="#" class="btn btn-icon btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
