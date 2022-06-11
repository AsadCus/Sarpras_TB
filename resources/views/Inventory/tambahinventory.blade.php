@extends('layoutnya')
@section('judul','Tambah Barang')
@section('isi')
<div class="card">
    <div class="card-body">
        <form action="">
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" placeholder="Masukkan Nama Barang" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" placeholder="Stok Keseluruhan" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Tersedia</label>
                <input type="number" placeholder="Jumlah Barang Yang Tersedia" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Rusak</label>
                <input type="number" placeholder="Jumlah Barang Yang Rusak" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Terpinjam</label>
                <input type="number" placeholder="Jumlah Barang Terpinjam" class="form-control">
            </div>
            
            <button class="btn btn-outline-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
