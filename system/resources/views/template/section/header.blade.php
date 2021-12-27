<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('template ')}}" class="nav-link">Beranda</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          @if(Auth::check())
          {{request()->user()->nama}}
          @else
          Silahkan Masuk    
          @endif
            <img src="{{url('public/assets')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" style="height: 100%"; alt="User Image">
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <i class="fa fa-user"></i>Profile
            <!-- Message End -->
          </a>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <i class="fa fa-cog"></i>Pengaturan
            <!-- Message End -->
          </a>
          <a href="{{url('logout')}}" class="dropdown-item">
            <!-- Message Start -->
            <i class="fa fa-sing-out"></i>Keluar
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
    </ul>
  </nav>