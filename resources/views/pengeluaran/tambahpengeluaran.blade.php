@extends('layoutnya')
@section('judul','Tambah Barang Keluar')
@section('isi')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ url('pengeluaran') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Kode Barang</label>
                <select required class="form-control form-select" name="kode_barang_id" id="kode_barang_id">
                    <option selected>Kode Barang</option>
                    @foreach ($barang as $item)
                    <option value="{{ $item->id }}">{{ $item->kode_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <select required class="form-control form-select" name="barang_id" id="barang_id">
                    <option selected>Nama Barang</option>
                    @foreach ($barang as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Nama Peminta</label>
                    <input required type="text" placeholder="Nama Peminta" class="form-control" name="nama_peminta" required>
                </div>
                <div class="col">
                    <label class="form-label">Status Peminta</label>
                    <select class="form-control form-select" required name="status_peminta" id="val_equipfc" onChange="checkOption(this)">
                        <option selected disabled>Pillih Status Peminjam</option>
                        <option value="Guru">Guru</option>
                        <option value="Murid">Murid</option>
                        <option value="Cleaning Service">Cleaning Service</option>
                    </select>
                </div>
            </div>
            <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Nama Operator</label>
                        <input type="text" class="form-control"
                            name="operator_id" id="operator_id" value="{{ Auth::user()->name }}">
                    </div>
                <div class="col mb-3">
                    <label class="form-label">Jumlah Keluar</label>
                    <input type="number" required placeholder="Jumlah Barang Yang Di Minta" class="form-control"
                        name="jumlah_keluar">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea class="form-control" required name="keterangan" placeholder="Keterangan Peminta"
                    style="height: 100px"></textarea>
            </div>
            <button class="btn btn-outline-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
