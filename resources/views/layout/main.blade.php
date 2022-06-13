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
            <h4>Referral URL</h4>
          </div>
          <div class="card-body">
            <div class="mb-4">
              <div class="text-small float-right font-weight-bold text-muted">2,100</div>
              <div class="font-weight-bold mb-1">Google</div>
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
            <li class="media">
              <img class="mr-3 rounded-circle" width="50" src="{{ asset('template') }}/assets/img/avatar/avatar-1.png" alt="avatar">
              <div class="media-body">
                <div class="float-right text-primary">Now</div>
                <div class="media-title">Farhan A Mujib</div>
                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
              </div>
            </li>
            <li class="media">
              <img class="mr-3 rounded-circle" width="50" src="{{ asset('template') }}/assets/img/avatar/avatar-2.png" alt="avatar">
              <div class="media-body">
                <div class="float-right">12m</div>
                <div class="media-title">Ujang Maman</div>
                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
              </div>
            </li>
            <li class="media">
              <img class="mr-3 rounded-circle" width="50" src="{{ asset('template') }}/assets/img/avatar/avatar-3.png" alt="avatar">
              <div class="media-body">
                <div class="float-right">17m</div>
                <div class="media-title">Rizal Fakhri</div>
                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
              </div>
            </li>
            <li class="media">
              <img class="mr-3 rounded-circle" width="50" src="{{ asset('template') }}/assets/img/avatar/avatar-4.png" alt="avatar">
              <div class="media-body">
                <div class="float-right">21m</div>
                <div class="media-title">Alfa Zulkarnain</div>
                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
              </div>
            </li>
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