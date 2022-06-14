@extends('layoutnya')
@section('judul','Edit Peminjaman')
@section('isi')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ url('peminjaman',$data->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-2">
                <label class="form-label">Nama Barang</label>
                <select class="form-control" name="barang_id" id="barang_id">
                  <option disabled value="{{ $data->barang_id }}">{{ $data->barang->nama_barang }}</option>
                  @foreach ($barang as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                  @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label">Nama Peminjam</label>
                <input type="text" placeholder="Nama Peminjam" class="form-control" name="nama_peminjam" value="{{ $data->nama_peminjam }}">
                </div>
                <div class="col">
                    <label class="form-label">Status Peminjam</label>
                    <select class="form-control" name="status_peminjam">
                        <option selected disabled>{{ $data->status_peminjam }}</option>
                        <option value="Guru">Guru</option>
                        <option value="Murid">Murid</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Kelas</label>
                <input type="text" placeholder="Nama Kelas" class="form-control" name="nama_kelas" value="{{ $data->nama_kelas }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Pinjam</label>
                <input type="number" placeholder="Jumlah Barang Yang Di Pinjam" class="form-control" name="jumlah_pinjam" value="{{ $data->jumlah_pinjam }}">
            </div>
            <div class="mb-3">
                <input type="hidden" placeholder="Jumlah Barang Terpinjam" class="form-control" name="status" value="Dipinjam">
            </div>
            {{-- <div class="mb-3">
                <label for="disabledSelect" class="form-label">Status</label>
                <select id="disabledSelect" class="form-select form-control" name="status">
                    <option selected disabled value="Dipinjam">{{ $data -> status }}</option>
                    <option value="Dipinjam">Meminjam</option>
                    <option value="Dikembalikan">Mengembalikan</option>
                </select>
            </div> --}}
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea class="form-control" name="keterangan" placeholder="Keterangan Peminjam" style="height: 100px">{{ $data->keterangan }}</textarea>
            </div>

            <button class="btn btn-outline-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
