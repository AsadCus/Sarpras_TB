@extends('layoutnya')
@section('judul','Peminjaman')
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
            <input type="text" name="search" id="input" class="form-control" placeholder="search in here">
            <button class="btn btn-outline-primary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
          </div>
        <a href="{{ url('peminjaman/create') }}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-plus"></i><span class="px-2">Tambah</span></a>
        <table class="table table-hover table-bordered table-responsive">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">Status Peminjam</th>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col">Jumlah Pinjam</th>
                    <th scope="col">Status</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="alldatapeminjam">
                @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->nama_peminjam }}</td>
                        <td>{{ $item->status_peminjam }}</td>
                        <td>{{ $item->nama_kelas }}</td>
                        <td>{{ $item->jumlah_pinjam }}</td>
                        <td><div class="btn btn-info">{{ $item -> status }}</div></td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ url('peminjaman/'.$item->id.'/edit') }}" class="btn btn-icon btn-warning"><i class="fas fa-pen"></i></a>
                            <form action="{{ url('peminjaman/'.$item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-danger delete" data-name="{{ $item->barang->nama_barang }}"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tbody id="pinjam" class="searchpinjam"></tbody>
            </tbody>
        </table>
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
     $('#input').on('keyup',function(){
         $value= $(this).val();
         if($value)
         {
          $('.alldatapeminjam').hide();
          $('.searchpinjam').show();
         }

         else
         {
          $('.alldatapeminjam').show();
          $('.searchpinjam').hide();
         }
         $.ajax({
            url: '{{URL::to('searchp')}}',
            type:"GET",
            data:{'search':$value},
            success:function(data){
                $('#pinjam').html(data);
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