@extends('layoutnya')
@section('judul','Inventory')
@section('isi')
<div class="card">
    <div class="card-body">
        <div class="input-group input-group-sm mb-3 col-4" style="float:right">
            <input type="search" name="search" id="searching" class="form-control" placeholder="Search Stock & Jumlah Tersedia">
            <button class="btn btn-outline-primary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
          </div>
        <a href="{{ url('inventory/create') }}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-plus"></i><span class="px-2">Tambah</span></a>
        <a href="/exportexcelinventory" class="btn btn-icon icon-left btn-success mb-4"><i class="fas fa-file-excel"></i><span class="px-2">Export Excel</span></a>
        <a href="{{ route('inventoryAllpdf') }}" class="btn btn-icon icon-left btn-danger mb-4"></i><i class="fa-solid fa-file-pdf"></i><span class="px-2">Export PDF</span></a>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Jumlah Tersedia</th>
                    <th scope="col">Jumlah Rusak</th>
                    <th scope="col">Jumlah Terpinjam</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="alldatainventory">
            @foreach ($datainventory as $index => $item)
                <tr>
                    <th scope="row">{{ $index + $datainventory->firstItem() }}</th>
                    <td>{{ $item->barang->kode_barang }}</td>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->jumlah_tersedia }}</td>
                    <td>{{ $item->jumlah_rusak }}</td>
                    <td>{{ $item->jumlah_pinjam }}</td>
                    <td> 
                        <form action="{{ url('inventory/'.$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-icon btn-danger delete" data-name="{{ $item->barang->nama_barang }}" style="float: right;margin-left:-1.1rem;"><i class="fas fa-trash"></i></button>
                        </form>

                        <a href="{{ url( 'inventory/'.$item->id. '/edit') }}" class="btn btn-icon btn-warning" style="float: right;margin-right:2.7rem;margin-top:-2.2rem"><i class="fas fa-pen"></i></a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
            <tbody id="inventory" class="searchingdata"></tbody>
        </table>
        <div class="paginatenya mt-3">
            {{ $datainventory->links() }}
            </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xU+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
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
    $(document).ready(function(){
     $('#searching').on('keyup',function(){
         $value= $(this).val();
         if($value)
         {
          $('.alldatainventory').hide();
          $('.searchingdata').show();
         }

         else
         {
          $('.alldatainventory').show();
          $('.searchingdata').hide();
         }
         $.ajax({
            url: '{{URL::to('searching')}}',
            type:"GET",
            data:{'search':$value},
            success:function(data){
                $('#inventory').html(data);
            }
     });
     //end of ajax call
    });
    });
</script>
<script>
    @if (Session:: has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
</script>

@endpush