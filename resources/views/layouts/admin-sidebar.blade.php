<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
            <span class="align-middle">Itrash Admin</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Modul Aplikasi
            </li>

            <li class="sidebar-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ Route::is('admin.kategori_sampah') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.kategori_sampah') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Kategori Sampah</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('admin/jenis-sampah*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.jenis_sampah') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Jenis Sampah</span>
                </a>
            </li>

            <li class="sidebar-item  {{ request()->is('admin/transaksi*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.transaksi') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Transaksi
                    </span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('admin.pembayaran')}}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Pembayaran</span>
                </a>
            </li>

        </ul>
    </div>
</nav>