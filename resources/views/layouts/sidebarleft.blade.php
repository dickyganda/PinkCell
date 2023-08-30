<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Session::get('level_user') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{-- <div class="image">
                <img src="{{ asset('assets/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div> --}}
            {{-- <div class="info">
                <a href="#" class="d-block">{{ Session::get('level_user') }}</a>
    </div> --}}
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/dashboard/index" class="nav-link {{ request()->is('dashboard/index') ? 'active' : ' ' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/trxin/index" class="nav-link {{ request()->is('trxin/index') ? 'active' : ' ' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Transaksi Masuk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/stok/index" class="nav-link {{ request()->is('stok/index') ? 'active' : ' ' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Stok
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/trxout/index" class="nav-link {{ request()->is('trxout/index') ? 'active' : ' ' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Transaksi Keluar
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>