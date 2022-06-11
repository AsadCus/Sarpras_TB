@extends('layoutnya')
@section('judul','Inventory')
@section('isi')
<!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
      </head>
      <body>
<div class="card">
    <div class="card-body">
        <a href="{{ url('inventory/create') }}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-plus"></i><span class="px-2">Tambah</span></a>
        <table class="table table-hover table-responsive table-bordered">
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
                <tr>
            @foreach ($datainventory as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->jumlah_tersedia }}</td>
                    <td>{{ $item->jumlah_rusak }}</td>
                    <td>{{ $item->jumlah_pinjam }}</td>
                    <td> 
                        <a href="{{ url( 'inventory/'.$item->id. '/edit') }}" class="btn btn-icon btn-warning mt-1"><i class="fas fa-edit"></i></a>

                       <form action="{{ url('inventory/'.$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-icon btn-danger mt-1"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
    </html>
@endsection
