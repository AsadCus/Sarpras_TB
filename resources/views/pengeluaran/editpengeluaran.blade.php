@extends('layoutnya')
@section('judul','Edit Barang Keluar')
@section('isi')
<div class="card">
    <div class="card-body">
        <form method="POST" action="/pengeluaran/{{$data->id}}">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Jumlah Keluar</label>
                    <input type="number" required placeholder="Jumlah Barang Yang Di Minta" value="{{ $data->jumlah_keluar }}" class="form-control"
                        name="jumlah_keluar">
                </div>
            </div>
            <button class="btn btn-outline-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection