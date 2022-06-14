@extends('layoutnya')
@section('judul','Dashboard')
@section('isi')
  <section class="section">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Stock</h4>
            </div>
            <div class="card-body">
              {{ $jmlsedia }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jumlah Peminjam</h4>
            </div>
            <div class="card-body">
              {{ $jmlpeminjam }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jumlah Kembali</h4>
            </div>
            <div class="card-body">
              {{ $jmlkembali }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-circle"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Online Users</h4>
            </div>
            <div class="card-body">
              47
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-6 col-md-6 col-12">
        <div class="card">
          <div class="card-header">
            <h4>Chart Diagram</h4>
          </div>
          <div class="card-body">
            <div class="mb-4">
              <div class="card card-primary">
                <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                </div>
          </div>
            
          </div>
        </div>
        <div class="card mt-sm-5 mt-md-0">
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4>Recent Activities</h4>
        </div>
        <div class="card-body">
          <ul class="list-unstyled list-unstyled-border">
            @foreach ($namapeminjam as $item)
            <li class="media">
              <img class="mr-3 rounded-circle" width="50" src="{{ asset('template') }}/assets/img/avatar/avatar-1.png" alt="avatar">
              <div class="media-body">
                <div class="float-right text-primary">{{ $item -> created_at -> diffForHumans() }}</div>
                <div class="media-title">{{ $item -> nama_peminjam }}</div>
                <span class="text-small text-muted">{{ $item -> barang -> nama_barang }} {{ $item -> status }} Oleh {{ $item -> nama_peminjam }} Untuk {{  $item -> keterangan }}</span>
              </div>
            </li>
            @endforeach
          </ul>
          <div class="text-center pt-1 pb-1">
            <a href="#" class="btn btn-primary btn-lg btn-round">
              View All
            </a>
          </div>
        </div>
      </div>
    </div>
@endsection
@push('scripts')
<script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</script>
<script>
  var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          @foreach($datainventory as $item)
          '{{ $item->barang->nama_barang }}',
          @endforeach
      ],
      datasets: [
        {
          data: [
            @foreach($datainventory as $item)
            {{ $item->stock }},
            @endforeach
          ],
          backgroundColor : ['#FF8C8C','#DAEAF1','#A760FF','#FF7F3F','#FFE162','#B4FE98'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
      beginAtZero: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
  </script>
@endpush