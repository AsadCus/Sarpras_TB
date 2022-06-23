<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Sapras &mdash; SMK Taruna Bhakti</title>

  <link rel="shortcut icon" href="{{ asset('template/img/smktb.jpg') }}">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('template/node_modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/node_modules/weathericons/css/weather-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/node_modules/weathericons/css/weather-icons-wind.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/node_modules/summernote/dist/summernote-bs4.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('template/assets/css/components.css') }}">

  <!-- Toastr Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @stack('style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            {{-- <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li> --}}
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('template/img/image39742384.jfif') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              {{-- <a href="/operator" class="dropdown-item has-icon">
                <i class="fas fa-users"></i> Operator
              </a> --}}
              <a href="/download" target="_blank" class="dropdown-item has-icon">
                <i class="fas fa-book"></i>Panduan Pengguna</a>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/main">SARPRAS</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Menu</li>
              <li class="nav-item {{ 'main' == request()->path() ? 'active' : '' }}">
                <a href="/main" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
              </li>
              <li class="nav-item {{ 'barang' == request()->path() ? 'active' : '' }}">
                <a href="/barang" class="nav-link"><i class="fas fa-th"></i><span>Barang</span></a>
              </li>
              {{-- <li class="nav-item {{ 'operator' == request()->path() ? 'active' : '' }}">
                <a href="{{ url('operator') }}" class="nav-link"><i class="fas fa-users"></i> <span>Operator</span></a>       --}}
              <li class="nav-item {{ 'inventory' == request()->path() ? 'active' : '' }}">
                <a href="/inventory" class="nav-link"><i class="fas fa-archive"></i> <span>Inventory</span></a>
              </li>
              <li class="nav-item {{ 'peminjaman' == request()->path() ? 'active' : '' }}">
                <a href="{{ url('peminjaman') }}" class="nav-link"><i class="fa-solid fa-envelope-open-text"></i><span>Peminjaman</span></a>
              </li>
              <li class="nav-item {{ 'pengeluaran' == request()->path() ? 'active' : '' }}">
                <a href="{{ url('pengeluaran') }}" class="nav-link"><i class="fa-solid fa-envelope-open-text"></i><span>Pengeluaran</span></a>
              </li>
              <li class="nav-item {{ 'pengembalian' == request()->path() ? 'active' : '' }}">
                <a href="{{ url('pengembalian') }}" class="nav-link"><i class="fas fa-history"></i><span>History</span></a>
              </li>
            </div>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('judul')</h1>
          </div>
          @yield('isi')
        </section>
          </div>
      </div>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('template/assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('template/node_modules/simpleweather/jquery.simpleWeather.min.js') }}"></script>
  <script src="{{ asset('template/node_modules/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('template/node_modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('template/node_modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <script src="{{ asset('template/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
  <script src="{{ asset('template/node_modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template/dist/js/demo.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('template/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('template/assets/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('template/assets/js/page/index-0.js') }}"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
  @stack('scripts')
</body>
</html>
