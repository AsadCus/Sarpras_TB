@extends('layoutnya')
@section('judul','Edit Inventory')
@section('isi')
<div class="card">
    <div class="card-body">
        <form action="{{ url('inventory/'.$inventory->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kode Barang</label>
                <select required class="form-select form-control" aria-label="Default select example" name="kode_barang_id">
                    <option selected value="{{ $inventory->kode_barang_id }}">{{ $inventory->barang->kode_barang }}
                    </option>
                    @foreach($databarang as $item)
                    <option value="{{ $item->id }}">{{  $item->kode_barang }}</option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                <select required class="form-select form-control" aria-label="Default select example" name="barang_id">
                    <option selected value="{{ $inventory->barang_id }}">{{ $inventory->barang->nama_barang }}
                    </option>
                    @foreach($databarang as $item)
                    <option value="{{ $item->id }}">{{  $item->nama_barang }}</option>
                    @endforeach
                </select>
            </div> --}}
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input required type="number" placeholder="Stok Keseluruhan" name="stock" class="form-control"
                    value="{{ $inventory->stock }}">
            </div>
            <div class="mb-3">
                {{-- <label class="form-label">Jumlah Tersedia</label> --}}
                <input required type="hidden" placeholder="Jumlah Barang Yang Tersedia" name="jumlah_tersedia"
                    class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Rusak</label>
                <input required type="number" placeholder="Jumlah Barang Yang Rusak" name="jumlah_rusak" class="form-control"
                    value="{{ $inventory->jumlah_rusak }}">
            </div>
            <fieldset disabled>
                <div class="mb-3">
                    <label class="form-label">Jumlah Terpinjam</label>
                    <input required type="number" placeholder="Jumlah Barang Terpinjam" name="jumlah_pinjam" class="form-control"
                        value="{{ $inventory->jumlah_pinjam }}">
                </div>
            </fieldset>
            <button class="btn btn-outline-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection