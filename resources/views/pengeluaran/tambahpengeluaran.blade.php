@extends('layoutnya')
@section('judul','Tambah Barang')
@section('isi')
<div class="card">
    <div class="card-body">
        <form action="{{ url('barang') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mb-3">
                <label class="form-label">Kode Barang</label>
                <input type="text" placeholder="Masukkan Kode Barang" class="form-control" name="kode_barang" required>
                @error('kode_barang')
                <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" placeholder="Masukkan Nama Barang" class="form-control" name="nama_barang" required>
                @error('nama_barang')
                <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Barang</label>
                <select class="form-control" name="jenis_barang" required>
                    <option selected disabled>Jenis Barang</option>
                    <option value="1">Laptop</option>
                    <option value="2">Kunci</option>
                    <option value="3">Proyektor</option>
                    <option value="4">Perlengkapan Komputer</option>
                    <option value="5">Lainnya</option>
                </select>
                @error('jenis_barang')
                <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Spesifikasi Barang</label>
                <textarea class="form-control" required name="spesifikasi" placeholder="Spesifikasi Barang"
                    style="height: 100px"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Foto Barang</label>
                <input type="file" class="form-control" name="foto_barang" required>
                @error('foto_barang')
                <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-outline-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
