<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="{{asset('admin/images/faces/face1.jpg')}}" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{Auth()->user()->nama}}</p>
                  <div>
                    <small class="designation text-muted">{{Auth()->user()->jabatan}}</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              {{-- <button class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </button> --}}
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Hewan Ternak</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                </li>
              </ul>
            </div>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.index')}}">
              <i class="menu-icon mdi mdi-account"></i>
              <span class="menu-title">Data User</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-donkey"></i>
              <span class="menu-title">Hewan Ternak</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-account-multiple-outline"></i>
              <span class="menu-title">Karyawan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-cup"></i>
              <span class="menu-title">Sarana Produksi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-cash-multiple"></i>
              <span class="menu-title">Keuangan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" >
              <i class="menu-icon mdi mdi-clipboard-text"></i>
              <span class="menu-title">Transaksi</span>
            </a>
          </li>
        </ul>
      </nav>
