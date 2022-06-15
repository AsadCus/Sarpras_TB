@extends('layoutnya')
@section('judul','Tambah Operator')
@section('isi')
<div class="card">
    <div class="card-body">
        <form action="{{ url('operator') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mb-3">
                <label class="form-label">Daftar Nama Operator</label>
                <input type="text" placeholder="Masukkan Nama Operator" class="form-control" name="nama_op">
                @error('nama_op')
                <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            <!--  -->
            <button class="btn btn-outline-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
