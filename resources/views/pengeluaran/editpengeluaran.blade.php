@extends('layoutnya')
@section('judul','Edit Barang Keluar')
@section('isi')
<div class="card">
    <div class="card-body">
        <form method="POST" action="/pengeluaran/{{$data->id}}">
            @csrf
            @method('patch')
            {{-- <div class="mb-3">
                <label class="form-label">Kode Barang</label>
                <select required disabled class="form-control" name="kode_barang_id" id="kode_barang_id">
                    <option disabled value="{{ $data->kode_barang_id }}">{{ $data->barang->kode_barang }}</option>
                    @foreach ($barang as $item)
                    <option value="{{ $item->id }}">{{ $item->kode_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <select disabled required class="form-control" name="barang_id" id="barang_id">
                    <option value="{{ $data->barang_id }}">{{ $data->barang->nama_barang }}</option>
                    @foreach ($barang as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                    @endforeach
                </select>
            </div> --}}
            {{-- <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Nama Peminta</label>
                    <input disabled required type="text" placeholder="Nama Peminta" class="form-control" name="nama_peminta" value="{{ $data->nama_peminta }}" required>
                </div>
                <div class="col">
                    <label class="form-label">Status Peminta</label>
                    <select class="form-control" disabled required name="status_peminta" id="val_equipfc" onChange="checkOption(this)">
                        <option value="{{ $data->status_peminta }}">{{ $data->status_peminta }}</option>
                    </select>
                </div>
            </div> --}}
            <div class="row">
                {{-- <div class="col mb-3">
                    <label class="form-label">Nama Operator</label>
                    <input type="text" disabled class="form-control" name="operator_id" id="operator_id"
                    value="{{ $data->operator_id }}">
                    <select class="form-control" required name="operator_id" id="operator_id">
                        <option disabled selected>Pilih Nama Operator</option>
                        @foreach ($operator as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_op }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="col mb-3">
                    <label class="form-label">Jumlah Keluar</label>
                    <input type="number" required placeholder="Jumlah Barang Yang Di Minta" value="{{ $data->jumlah_keluar }}" class="form-control"
                        name="jumlah_keluar">
                </div>
            </div>
            {{-- <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea class="form-control" disabled required name="keterangan" placeholder="Keterangan Peminta"
                    style="height: 100px">{{ $data->keterangan }}</textarea>
            </div> --}}
            <button class="btn btn-outline-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
