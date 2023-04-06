<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>&rsaquo; SIMBA &rsaquo; Dashboard</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../backend/css/style.css">
  <link rel="stylesheet" href="../backend/css/components.css">
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="index.html" class="navbar-brand sidebar-gone-hide">SIMBA</a>
        <div class="navbar-nav">
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <ul class="navbar-nav">
            <li class="nav-item active"><a href="#" class="nav-link">Aplikasi</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Laporan</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Status Server</a></li>
          </ul>
        </div>
        <form class="form-inline ml-auto">
          <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li>
            {{-- <a href="{{ route('login') }}" class="nav-link nav-link-lg nav-link-user"> --}}
            {{-- <img alt="image" src="../backend/img/avatar/avatar-1.png" class="rounded-circle mr-1"> --}}
            {{-- <div class="d-sm-none d-lg-inline-block">Login</div></a> --}}
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ route('home') }}" class="nav-link nav-link-lg nav-link-user">Dashboard</a>
                        @else
                        <a href="{{ route('login') }}" class="nav-link nav-link-lg nav-link-user">Log in</a>
                    @endauth
                </div>
            @endif</li>
          </li>
        </ul>
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="#" class="nav-link">General Dashboard</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Ecommerce Dashboard</a></li>
              </ul>
            </li>
            <li class="nav-item active">
              <a href="#" class="nav-link"><i class="far fa-heart"></i><span>Top Navigation</span></a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Multiple Dropdown</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
                <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover Me</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link 2</a>
                      <ul class="dropdown-menu">
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                      </ul>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total GTK</h4>
                  </div>
                  <div class="card-body">
                    140
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
                    <h4>SD</h4>
                  </div>
                  <div class="card-body">
                    34
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
                    <h4>SMP</h4>
                  </div>
                  <div class="card-body">
                    42
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
                    <h4>SMK</h4>
                  </div>
                  <div class="card-body">
                    84
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Grafik Kehadiran Guru Hari Ini</h4>
                </div>
                <div class="card-body">
                  <div class="mb-4">
                    <div class="text-small float-right font-weight-bold text-muted">75%</div>
                    <div class="font-weight-bold mb-1">SD Bakti Nusantara 666</div>
                    <div class="progress" data-height="3" style="height: 3px;">
                      <div class="progress-bar" role="progressbar" data-width="75%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                    </div>
                  </div>

                  <div class="mb-4">
                    <div class="text-small float-right font-weight-bold text-muted">65%</div>
                    <div class="font-weight-bold mb-1">SMP Bakti Nusantara 666</div>
                    <div class="progress" data-height="3" style="height: 3px;">
                      <div class="progress-bar" role="progressbar" data-width="66%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 67%;"></div>
                    </div>
                  </div>

                  <div class="mb-4">
                    <div class="text-small float-right font-weight-bold text-muted">70%</div>
                    <div class="font-weight-bold mb-1">SMK Bakti Nusantara 666</div>
                    <div class="progress" data-height="3" style="height: 3px;">
                      <div class="progress-bar" role="progressbar" data-width="70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 58%;"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Grafik Kehadiran Guru Minggu ini</h4>
                  </div>
                  <div class="card-body">
                    <div class="mb-4">
                      <div class="text-small float-right font-weight-bold text-muted">98%</div>
                      <div class="font-weight-bold mb-1">SD Bakti Nusantara 666</div>
                      <div class="progress" data-height="3" style="height: 3px;">
                        <div class="progress-bar" role="progressbar" data-width="98%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                      </div>
                    </div>

                    <div class="mb-4">
                      <div class="text-small float-right font-weight-bold text-muted">100%</div>
                      <div class="font-weight-bold mb-1">SMP Bakti Nusantara 666</div>
                      <div class="progress" data-height="3" style="height: 3px;">
                        <div class="progress-bar" role="progressbar" data-width="100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 67%;"></div>
                      </div>
                    </div>

                    <div class="mb-4">
                      <div class="text-small float-right font-weight-bold text-muted">80%</div>
                      <div class="font-weight-bold mb-1">SMK Bakti Nusantara 666</div>
                      <div class="progress" data-height="3" style="height: 3px;">
                        <div class="progress-bar" role="progressbar" data-width="80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 58%;"></div>
                      </div>
                    </div>

                  </div>
                </div>
            </div>
          </div>
          {{-- <div class="section-body">
            <div class="card">
              <div class="card-header">
                <h4>Example Card</h4>
              </div>
              <div class="card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
              <div class="card-footer bg-whitesmoke">
                This is card footer
              </div>
            </div>
          </div> --}}
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-right">
          Copyright &copy; 2022 <div class="bullet"></div> Development By <a href="#">IoTech Studio</a>
        </div>
        <div class="footer-left">
          Sistem Informasi Baknus (SIMBA) Ver 1.0.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../backend/js/stisla.js"></script>

  <!-- JS Libraies -->


  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="../backend/js/scripts.js"></script>
  <script src="../backend/js/custom.js"></script>
</body>
</html>
