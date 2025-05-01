<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                LOGISTIK
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item {{ request()->routeIs('barang_masuk.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('barang_masuk.index') }}">
                <i class="nc-icon nc-chart-pie-35"></i>
                <p>Barang Masuk</p>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('barang_keluar.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('barang_keluar.index') }}">
                <i class="nc-icon nc-circle-09"></i>
                <p>Barang Keluar</p>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('barang.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('barang.index') }}">
                <i class="nc-icon nc-bell-55"></i>
                <p>Stok Barang</p>
            </a>
        </li>
        </ul>
    </div>
</div>