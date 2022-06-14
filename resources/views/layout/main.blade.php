@extends('layoutnya')
@section('judul','Dashboard')
@section('isi')
  <section class="section">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-secondary">
            <i class="fas fa-archive"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Stock</h4>
            </div>
            <div class="card-body">
              {{-- {{ $jmlsedia }} --}}
              9999
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-info">
            <i class="fas fa-inbox"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Peminjam</h4>
            </div>
            <div class="card-body">
              {{ $jmlpeminjam }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-inbox"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pengembalian</h4>
            </div>
            <div class="card-body">
              {{ $jmlkembali }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-user"></i>
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
<<<<<<< HEAD
              <div class="card card-primary">
                <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                </div>
          </div>
            
=======
              <div class="text-small float-right font-weight-bold text-muted">2,100</div>
              <div class="font-weight-bold mb-1">Laptop</div>
              <div class="progress" data-height="3">
                <div class="progress-bar" role="progressbar" data-width="80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="mb-4">
              <div class="text-small float-right font-weight-bold text-muted">1,880</div>
              <div class="font-weight-bold mb-1">Facebook</div>
              <div class="progress" data-height="3">
                <div class="progress-bar" role="progressbar" data-width="67%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="mb-4">
              <div class="text-small float-right font-weight-bold text-muted">1,521</div>
              <div class="font-weight-bold mb-1">Bing</div>
              <div class="progress" data-height="3">
                <div class="progress-bar" role="progressbar" data-width="58%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="mb-4">
              <div class="text-small float-right font-weight-bold text-muted">884</div>
              <div class="font-weight-bold mb-1">Yahoo</div>
              <div class="progress" data-height="3">
                <div class="progress-bar" role="progressbar" data-width="36%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="mb-4">
              <div class="text-small float-right font-weight-bold text-muted">473</div>
              <div class="font-weight-bold mb-1">Kodinger</div>
              <div class="progress" data-height="3">
                <div class="progress-bar" role="progressbar" data-width="28%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="mb-4">
              <div class="text-small float-right font-weight-bold text-muted">418</div>
              <div class="font-weight-bold mb-1">Multinity</div>
              <div class="progress" data-height="3">
                <div class="progress-bar" role="progressbar" data-width="20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
>>>>>>> d8c1995958abcf575f6af24697af95c95c797a5f
          </div>
        </div>
        <div class="card mt-sm-5 mt-md-0">
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4>Sarpras History</h4>
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