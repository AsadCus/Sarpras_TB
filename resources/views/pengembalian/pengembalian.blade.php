@extends('layoutnya')
@section('judul','History Peminjaman')
@section('isi')
<style>

      .table {
      width: 100%;
      }
    /* ul li {
        list-style: none;
    }

    ul li .tooltip {
        position: absolute;
        text-align: center;
        width: 122px;
        transform: translateY(-50%);
        transform: translateX(-150px);
        border-radius: 7px;
        background: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        transition: 0s;
        opacity: 0;
        pointer-events: none;
        display: block;
        font-weight: bold;
    }

    ul li:hover .tooltip {
        transition: all 1s ease;
        opacity: 1;
        transform: translateX(-150px);
        /* top: 50%; */
    /* } */
</style>
<div class="container">
    <div class="coba" style="width:105%;margin-left:-1.5rem">
<div class="card">
    <div class="card-body">
        {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
    </div>
    @endif
    @if ($message = Session::get('destroy'))
    <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
    @endif --}}
    <div class="input-group input-group-sm mb-3 col-4" style="float:right">
        <input type="text" name="search" id="inputpengembalian" class="form-control" placeholder="Search Nama Peminjam & Status">
        <button class="btn btn-outline-primary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
    </div>
    <a href="/exportexcelpeminjaman" class="btn btn-icon icon-left btn-success mb-4"></i><i class="fas fa-file-excel"></i><span class="px-2">Export Excel</span></a>
    <a href="{{ route('pengembalianAllpdf') }}" class="btn btn-icon icon-left btn-danger mb-4"></i><i class="fa-solid fa-file-pdf"></i><span class="px-2">Export PDF</span></a>
    <table class="table table-hover table-bordered" style="margin-left:-1.1rem">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Nama Pengembali</th>
                <th scope="col">Status Peminjam</th>
                <th scope="col">Nama Operator</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Jumlah Pinjam</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody class="alldatapengembalian">
            @foreach ( $data as $index => $item )
            <tr>
                <th scope="row">{{ $index + $data->firstItem() }}</th>
                <td>{{ $item->barang->nama_barang }}</td>
                <td>{{ $item->nama_peminjam }}</td>
                <td>{{ $item->nama_pengembali }}</td>
                <td>{{ $item->status_peminjam }}</td>
                <td>{{ $item->operator_id }}</td>
                <td>{{ $item->nama_kelas }}</td>
                <td>{{ $item->jumlah_pinjam }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
        <tbody id="pengembalian" class="searchpengembalian"></tbody>
    </table>
    <div class="paginatenya mt-3">
        {{ $data->links() }}
    </div>
</div>
</div>
</div></div>
@endsection

@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xU+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>

<script>
    $(document).ready(function () {
        $('#inputpengembalian').on('keyup', function () {
            $value = $(this).val();
            if ($value) {
                $('.alldatapengembalian').hide();
                $('.searchpengembalian').show();
            } else {
                $('.alldatapengembalian').show();
                $('.searchpengembalian').hide();
            }
            $.ajax({
            url:'{{URL::to('searchpengembalian')}}',
            type:"GET",
            data:{'search':$value},
            success:function(data){
                $('#pengembalian').html(data);
            }
            });
            //end of ajax call
        });
    });
</script>
{{-- <script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
</script> --}}

@endpush