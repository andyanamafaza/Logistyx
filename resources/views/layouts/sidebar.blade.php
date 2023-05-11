<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('AdminLTE-3/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Config::get('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('AdminLTE-3/dist/img/user2-160x160') }}.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('user.profil') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Master</li>
                <li class="nav-item">
                    <a href="{{ route('gudang.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-warehouse"></i>
                        <p>
                            Gudang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-cube"></i>
                        <p>
                            Kategori
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('produk.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-cubes"></i>
                        <p>
                            Produk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('supplier.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-truck"></i>
                        <p>
                            Supplier
                        </p>
                    </a>
                </li>

                <li class="nav-header">Transaksi</li>


                <li class="nav-item">
                    <a href="{{ route('pembelian.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-download"></i>
                        <p>
                            Pembelian
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penjualan.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-upload"></i>
                        <p>
                            Penjualan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transaksi.baru') }}" class="nav-link">
                        <i class="nav-icon fa fa-cart-arrow-down"></i>
                        <p>
                            Transaksi Aktif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transaksi.baru') }}" class="nav-link">
                        <i class="nav-icon fa fa-cart-arrow-down"></i>
                        <p>
                            Transaksi Baru
                        </p>
                    </a>
                </li>

                <li class="nav-header">SYSTEM</li>

                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('setting.index') }}" class="nav-link">
                        <i class="fa fa-cogs"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
