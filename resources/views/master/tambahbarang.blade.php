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
                <label class="form-label">Jenis Barang</label>
                <select class="form-control">
                    <option selected disabled>Jenis Barang</option>
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Foto Barang</label>
                <input type="file" class="form-control">
            </div>
            <button class="btn btn-outline-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
