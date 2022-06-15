@extends('layoutnya')
@section('judul','Edit Peminjaman')
@section('isi')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ url('peminjaman',$data->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-2">
                <label class="form-label">Nama Barang</label>
                <select disabled class="form-control" name="barang_id" id="barang_id">
                  <option disabled value="{{ $data->barang_id }}">{{ $data->barang->nama_barang }}</option>
                  @foreach ($barang as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                  @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Nama Peminjam</label>
                <input type="text" placeholder="Nama Peminjam" class="form-control" name="nama_peminjam" value="{{ $data->nama_peminjam }}">
                </div>
                <div class="col mb-3">
                    <label class="form-label">Status Peminjam</label>
                    <select disabled class="form-control" name="status_peminjam">
                        <option selected disabled>{{ $data->status_peminjam }}</option>
                        <option value="Guru">Guru</option>
                        <option value="Murid">Murid</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <div class="mb-2">
                    <label class="form-label">Nama Operator</label>
                    <select class="form-control" name="operator_id" id="operator_id">
                    <option disabled value="{{ $data->operator_id }}">{{ $data->operator->nama_op }}</option>
                    @foreach ($operator as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_op }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label class="form-label">Nama Kelas</label>
                <input disabled type="text" placeholder="Nama Kelas" class="form-control" name="nama_kelas" value="{{ $data->nama_kelas }}">
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Jumlah Pinjam</label>
                <input type="number" placeholder="Jumlah Barang Yang Di Pinjam" class="form-control" name="jumlah_pinjam" disabled value="{{ $data->jumlah_pinjam }}">
            </div>
            <div class="col mb-3">
                <label for="form-label">Status</label>
                <select class="form-control" name="status" id="status">
                    <option value="" disabled>Pilih Status</option>
                    <option value="Dipinjam">Dipinjam</option>
                    <option value="Dikembalikan">Dikembalikan</option>
                  </select>
            </div>
        </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea disabled class="form-control" name="keterangan" placeholder="Keterangan Peminjam" style="height: 100px">{{ $data->keterangan }}</textarea>
            </div>

            <button class="btn btn-outline-primary edit" type="submit" data-name="{{ $data->barang->nama_barang }}">Submit</button>
        </form>
    </div>
</div>
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
    $('.edit').click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Are you sure you want to Edit ${name}?`,
                text: "If you Edit this, it will be editing.",
                icon: "info",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                    swal("Data berhasil di edit", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak jadi diedit");
                }
            });
    });
</script>
@endpush