@extends('layoutnya')
@section('judul','Tambah Inventory')
@section('isi')
<div class="card">
    <div class="card-body">
        <form action="{{ url('inventory') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                <select class="form-select form-control" aria-label="Default select example" name="barang_id">
                <option selected>Nama Barang</option>
                <!-- <option value="1">Offline</option>
                <option value="2">Online</option> -->
                @foreach($databarang as $item)
                <option value="{{ $item->id }}">{{  $item->nama_barang }}</option>
                @endforeach
            </select>
        </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" placeholder="Stok Keseluruhan" class="form-control" name="stock">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Tersedia</label>
                <input type="number" placeholder="Jumlah Barang Yang Tersedia" class="form-control" name="jumlah_tersedia">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Rusak</label>
                <input type="number" placeholder="Jumlah Barang Yang Rusak" class="form-control" name="jumlah_rusak">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Terpinjam</label>
                <input type="number" placeholder="Jumlah Barang Terpinjam" class="form-control" name="jumlah_pinjam">
            </div>
            
            <button class="btn btn-outline-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
