@extends('layoutnya')
@section('judul','Peminjaman Barang')
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
                      <option value="{{ $item->id }}">{{ $item->barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Peminjam</label>
                <input type="number" placeholder="Nama Peminjam" class="form-control" name="nama_peminjam">
            </div>
            <label class="form-label">Status Peminjam</label>
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_peminjam">
                    <label class="form-check-label">
                      Guru
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_peminjam">
                    <label class="form-check-label">
                      Murid
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Kelas</label>
                <input type="text" placeholder="Nama Kelas" class="form-control" name="nama_keals">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Pinjam</label>
                <input type="number" placeholder="Jumlah Barang Yang Di Pinjam" class="form-control" name="jumlah_pinjam">
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <input type="hidden" placeholder="Jumlah Barang Terpinjam" class="form-control" name="status" value="1">
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
