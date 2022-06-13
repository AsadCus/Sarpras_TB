@extends('layoutnya')
@section('judul','Tambah Peminjaman')
@section('isi')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ url('peminjaman') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <select class="form-control" name="barang_id" id="barang_id">
                    <option disabled selected>Pilih Nama Barang</option>
                    @foreach ($barang as $item)
                      <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label">Nama Peminjam</label>
                    <input type="text" placeholder="Nama Peminjam" class="form-control" name="nama_peminjam">
                </div>
                <div class="col">
                    <label class="form-label">Status Peminjam</label>
                    <select class="form-control" name="status_peminjam">
                        <option selected disabled>Pillih Status Peminjam</option>
                        <option value="Guru">Guru</option>
                        <option value="Murid">Murid</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Kelas</label>
                <input type="text" placeholder="Nama Kelas" class="form-control" name="nama_kelas">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Pinjam</label>
                <input type="number" placeholder="Jumlah Barang Yang Di Pinjam" class="form-control" name="jumlah_pinjam">
            </div>
            <div class="mb-3">
                <input type="hidden" placeholder="Jumlah Barang Terpinjam" class="form-control" name="status" value="Dipinjam">
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea class="form-control" name="keterangan"></textarea>
            </div>

            <button class="btn btn-outline-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
