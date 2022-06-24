@extends('layoutnya')
@section('judul','Barang')
@section('isi')
@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<style>
  table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before {
    right: 1em;
    font-size: 30px !important;
}

table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
    right: 0.5em;
    font-size: 30px !important;
}
</style>
@endpush
<div class="card">
    <div class="card-body">
      <button class="btn btn-flat btn-warning btn-refresh mb-4"><i class="fa fa-refresh"></i> Refresh</button>
        <a href="{{ url('barang/create') }}" class="btn btn-icon icon-left btn-primary mb-4"><i
                class="fas fa-plus"></i><span class="px-2">Tambah</span></a>
        <a href="/exportexcelbarang" class="btn btn-icon icon-left btn-success mb-4"></i><i class="fas fa-file-excel"></i><span class="px-2">Export</span></a>
        <a href="{{ route('barangAllpdf') }}" class="btn btn-danger" style="margin-top:-1.5rem">Export PDF</a>
        <table class="table table-hover table-bordered dataTable" id="barang-table">
            <thead style="font-size: 14px">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Spesifikasi</th>
                    <th scope="col">Foto Barang</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="alldata">
              @foreach ( $barang as $item )
              <tr>
                <th scope="row">{{ $loop->iteration }}</th> 
                <td>{{ $item->kode_barang }}</td>                        
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->jenis_barang }}</td>
                <td>{{ $item->spesifikasi }}</td>
                <td><img src="{{ asset('img/'.$item->foto_barang) }}" alt="" style="width: 100px"></td>
                <td style="display: flex">
                  <div class="dis d-flex">
                  <a href="{{ url('/barang/detail/'.$item->id) }}" class="btn btn-icon btn-info ms-1" ><i class="fas fa-eye"></i></a>
                  <a href="{{ url('barang/'.$item->id.'/edit') }}" class="btn btn-icon btn-warning ms-1" ><i class="fas fa-pen"></i></a>
                  <form action="{{ url('barang',$item->id) }}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-icon btn-danger delete ms-1" data-name="{{ $item->nama_barang }}"><i class="fas fa-trash"></i></button>
                  </form>
                </div>
                  </td>
            </tr>
              @endforeach
          </tbody>
            <tbody id="contentnya" class="searchdata"></tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/validator/13.7.0/validator.min.js" integrity="sha512-rJU+PnS2bHzDCvRGFhXouCSxf4YYaUyUfjXMHsHFfMKhWDIEBr8go2LZ2EYXOqASey1tWc2qToeOCYh9et2aGQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
    
    <script type="text/javascript">
      $(document).ready(function(){
   
          // btn refresh
          $('.btn-refresh').click(function(e){
              e.preventDefault();
              $('.preloader').fadeIn();
              location.reload();
          })
   
      })
  </script>

    <script>
            
      $('.delete').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Are you sure you want to delete ${name}?`,
          text: "If you delete this, it will be gone forever.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
          swal("Data berhasil di hapus", {
                icon: "success",
                });
        }else 
        {
          swal("Data tidak jadi dihapus");
        }
      });
  });
    </script>

<script>
  $(function() {
      $('#barang-table').DataTable({
          columnDefs: [
            {
              paging: true,
              scrollX: true,
              lengthChange : true,
              searching: true,
              ordering: true,
                targets: [1, 2, 3, 4],
            },
        ],
    });
 
    $('button').click(function () {
        var data = table.$('input, select','button','form').serialize();
        return false;
    });
    table.columns().iterator('column', function (ctx, idx) {
        $(table.column(idx).header()).prepend('<span class="sort-icon"/>');
    });
  });
</script>

<script>
    @if (Session:: has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
</script>

@endpush