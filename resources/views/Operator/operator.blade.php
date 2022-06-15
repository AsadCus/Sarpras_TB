@extends('layoutnya')
@section('judul','Operator')
@section('isi')
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
            <input type="search" name="searchop" id="searchop" class="form-control" placeholder="Search Operator">
            <button class="btn btn-outline-primary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
          </div>
        <a href="{{ url('operator/create') }}" class="btn btn-icon icon-left btn-primary mb-4"><i
                class="fas fa-plus"></i><span class="px-2">Tambah</span></a>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Operator                     {{-- <span wire:click="sortBy('')" class="float-right text-sm" style="cursor: pointer"><i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down text-muted"></i></span> --}}
                    </th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="alldataoperator">
                @foreach ( $operator as $index => $item )
                <tr>
                  <th scope="row">{{ $index + $operator->firstItem() }}</th>                         
                  <td>{{ $item->nama_op }}</td>
                  <td>
                    <form action="{{ url('operator',$item->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-icon btn-danger delete" data-name="{{ $item->nama_op }}" style="float: right;margin-left:.3rem"><i class="fas fa-trash"></i></button>
                    </form>

                    <a href="{{ url('operator/'.$item->id.'/edit') }}" class="btn btn-warning" style="float: right"><i class="fas fa-pen"></i></a>
                    </td>
              </tr>
                @endforeach
            </tbody>
              <tbody id="operator" class="searchdataoperator"></tbody>
        </table>
        <div class="paginatenya mt-3">
        {{ $operator->links() }}
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
     $('#searchop').on('keyup',function(){
         $value= $(this).val();
         if($value)
         {
          $('.alldataoperator').hide();
          $('.searchdataoperator').show();
         }

         else
         {
          $('.alldataoperator').show();
          $('.searchdataoperator').hide();
         }
         $.ajax({
            url:'{{URL::to('searchop')}}',
            type:"GET",
            data:{'search':$value},
            success:function(data){
                $('#operator').html(data);
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