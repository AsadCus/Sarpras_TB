@extends('layoutnya')
@section('judul','Barang')
@section('isi')
<div class="card">
    <div class="card-body">
        <a href="{{ url('peminjaman/create') }}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-plus"></i><span class="px-2">Tambah</span></a>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">Status Peminjam</th>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col">Jumlah Pinjam</th>
                    <th scope="col">Status</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_pinjam as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->nama_peminjam }}</td>
                        <td>{{ $item->status_peminjam }}</td>
                        <td>{{ $item->jumlah_pinjam }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ url('peminjaman/'.$item->id.'/edit') }}" class="btn btn-icon btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="{{ url('peminjaman/'.$item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a type="submit" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection