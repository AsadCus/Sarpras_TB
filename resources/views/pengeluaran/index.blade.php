@extends('layoutnya')
@section('judul','Pengeluaran')
@section('isi')
<div class="card">
    <div class="card-body">
        <div class="input-group input-group-sm mb-3 col-4" style="float:right">
            <input type="search" name="search" id="search" class="form-control" placeholder="Search Barang & Jenis Barang">
            <button class="btn btn-outline-primary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
          </div>
        <a href="{{ url('pengeluaran/create') }}" class="btn btn-icon icon-left btn-primary mb-4"><i
                class="fas fa-plus"></i><span class="px-2">Tambah</span></a>
        {{-- <a href="/exportexcelbarang" class="btn btn-icon icon-left btn-success mb-4"></i><i class="fas fa-file-excel"></i><span class="px-2">Export</span></a>
        <a href="{{ route('barangAllpdf') }}" class="btn btn-danger" style="margin-top:-1.5rem">Export PDF</a> --}}
        <table class="table table-hover table-bordered" style="margin-left:-1.1rem">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Nama Peminta</th>
                    <th scope="col">Status Peminta</th>
                    <th scope="col">Jumlah Keluar</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Nama Operator</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="allpengeluaran">
                @foreach ( $data as $index => $item )
                <tr>
                  <th scope="row">{{ $index + $data->firstItem() }}</th> 
                  <td>{{ $item->barang->kode_barang }}</td>                        
                  <td>{{ $item->barang->nama_barang }}</td>
                  <td>{{ $item->nama_peminta }}</td>
                  <td>{{ $item->status_peminta }}</td>
                  <td>{{ $item->jumlah_keluar }}</td>
                  <td>{{ $item->keterangan }}</td>
                  <td>{{ $item->operator_id }}</td>
                  <td>
                    <a href="{{ url('pengeluaran/'.$item->id.'/edit') }}" class="btn btn-icon btn-warning" style="float: right;margin-right:.8rem"><i class="fas fa-pen"></i></a>
                    </td>
              </tr>
                @endforeach
            </tbody>
              <tbody id="contentnya" class="searchdata"></tbody>
        </table>
        <div class="paginatenya mt-3">
        {{ $data->links() }}
        </div>
    </div>
</div>
@endsection