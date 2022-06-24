@extends('layoutnya')
@section('judul','Tambah Inventory')
@section('isi')
<div class="card">
    <div class="card-body">
        <form action="{{ url('inventory') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kode Barang</label>
                <select class="form-select form-control" required aria-label="Default select example" name="barang_id">
                    <option selected>Kode Barang</option>
                    @foreach($databarang as $item)
                    <option value="{{ $item->id }}">{{  $item->kode_barang }} - {{  $item->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" required placeholder="Stok Keseluruhan" class="form-control" name="stock">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Rusak</label>
                <input type="number" required placeholder="Jumlah Barang Yang Rusak" class="form-control" name="jumlah_rusak">
            </div>
            <div class="mb-3">
                {{-- <label class="form-label">Jumlah Terpinjam</label> --}}
                <input type="hidden" required placeholder="Jumlah Barang Terpinjam" class="form-control" name="jumlah_pinjam"
                    value="0">
            </div>

            <button class="btn btn-outline-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection