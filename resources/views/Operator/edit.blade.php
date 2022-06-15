@extends('layoutnya')
@section('judul','Edit Operator')
@section('isi')
<div class="card">
    <div class="card-body">
        <form action="{{ url('operator',$operator->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Operator</label>
                <input type="text" placeholder="Masukkan Nama Barang" class="form-control"
                    value="{{ $operator->nama_op }}" name="nama_op">
                @error('nama_op')
                <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-outline-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection