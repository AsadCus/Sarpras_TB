@extends('layoutnya')
@section('judul','Inventory')
@section('isi')
<div class="card">
    <div class="card-body">
        <div class="input-group input-group-sm mb-3 col-4" style="float:right">
            <input type="search" name="search" id="search" class="form-control" placeholder="search in here">
            <button class="btn btn-outline-primary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
          </div>
        <a href="{{ url('inventory/create') }}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-plus"></i><span class="px-2">Tambah</span></a>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Jumlah Tersedia</th>
                    <th scope="col">Jumlah Rusak</th>
                    <th scope="col">Jumlah Terpinjam</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($datainventory as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->jumlah_tersedia }}</td>
                    <td>{{ $item->jumlah_rusak }}</td>
                    <td>{{ $item->jumlah_pinjam }}</td>
                    <td> 
                        <a href="{{ url( 'inventory/'.$item->id. '/edit') }}" class="btn btn-icon btn-warning"><i class="fas fa-pen"></i></a>

                       <form action="{{ url('inventory/'.$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
@endsection
