3<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Rumah Optik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Session::get('nama_jabatan') }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(\Session::has('Admin'))
            <li class="nav-item menu-open">
              <a href="/index" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Data Master
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/dataJabatan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jabatan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dataPegawai" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pegawai</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dataKategori" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ketegori Barang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dataBarang" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Barang</p>
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="nav-item">
              <a href="/pemeriksaan" class="nav-link">
                <i class="nav-icon fas fa-eye"></i>
                <p>
                  Pemeriksaan
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/pemesanan" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Pemesanan
                </p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="/penjualan" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Penjualan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/pembayaran" class="nav-link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>
                  Pembayaran
                </p>
              </a>
            </li>
          
            <li class="nav-header">Akun</li>
            <li class="nav-item">
              <a href="/profile" class="nav-link btn-info">
                <i class="nav-icon fas fa-user"></i>
                <p>Edit Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/logoutCek" class="nav-link btn-secondary">
                <i class="nav-icon fas fa-power-off"></i>
                <p>Logout Akun</p>
              </a>
            </li>
          @endif
          @if(\Session::has('Kasir'))
            <li class="nav-item">
              <a href="/pemesanan" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Pemesanan
                </p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="/penjualan" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Penjualan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/pembayaran" class="nav-link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>
                  Pembayaran
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/logoutCek" class="nav-link btn-secondary">
                <i class="nav-icon fas fa-power-off"></i>
                <p>Logout Akun</p>
              </a>
            </li>
          @endif
          @if(\Session::has('Pemilik'))
            <li class="nav-item menu-open">
              <a href="/index" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Data Master
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/dataJabatan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jabatan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dataPegawai" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pegawai</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dataKategori" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ketegori Barang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dataBarang" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Barang</p>
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="nav-item">
              <a href="/pemeriksaan" class="nav-link">
                <i class="nav-icon fas fa-eye"></i>
                <p>
                  Pemeriksaan
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/pemesanan" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Pemesanan
                </p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="/penjualan" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Penjualan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/pembayaran" class="nav-link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>
                  Pembayaran
                </p>
              </a>
            </li>

            <li class="nav-header">Laporan</li>
            <li class="nav-item">
              <a href="/laporan" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Laporan Penjualan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/laporan/laporanPiutang" class="nav-link">
                <i class="nav-icon fas fa-money-check-alt"></i>
                <p>
                  Laporan Piutang
                </p>
              </a>
            </li>            
            <li class="nav-item">
              <a href="/laporan/laporanPembayaran" class="nav-link">
                <i class="nav-icon fas fa-dollar-sign"></i>
                <p>
                  Laporan Pembayaran
                </p>
              </a>
            </li>
          
            <li class="nav-header">Akun</li>
            <li class="nav-item">
              <a href="/profile" class="nav-link btn-info">
                <i class="nav-icon fas fa-user"></i>
                <p>Edit Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/logoutCek" class="nav-link btn-secondary">
                <i class="nav-icon fas fa-power-off"></i>
                <p>Logout Akun</p>
              </a>
            </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>