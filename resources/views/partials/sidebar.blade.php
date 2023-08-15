<ul class="navbar-nav bg-gradient-primary sidebar fixed sidebar-dark accordion" id="accordionSidebar"
    style=" z-index: 100;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_dashboard.php">
        <div class="sidebar-brand-text mx-3">PEGAWAI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link" href="/dashboard">
            <i class="fa-solid fa-house-chimney"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        DATA APOTEK
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Kelola Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="/persediaan">Persediaan</a>
                <a class="collapse-item" href="/suplier">Supplier</a>
                <a class="collapse-item" href="/obat">Obat</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        LAPORAN
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Kelola Transaksi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="/transaksi">Penjualan</a>
                <a class="collapse-item" href="#">Pengeluaran</a>
                <a class="collapse-item" href="#">Rekap</a>
            </div>
        </div>
    </li>
    {{-- <li class="nav-item ">
        <a class="nav-link" href="/transaksi">
            <i class="fa-solid fa-file-invoice-dollar"></i>
            <span>Data Transaksi</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        PENGATURAN
    </div>
    <li class="nav-item ">
        <a class="nav-link" href="/user">
            <i class="fa-solid fa-gear"></i>
            <span>User</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <div class="nav-item d-flex py-2 mb-2 justify-content-center">
        <a href="#" class="btn btn-outline-light py-1" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-rotate-270"></i> <span>Logout</span>
        </a>
    </div>
    <div class="sidebar-card d-none d-lg-flex">
        <p class="text-center mb-2"><strong> Sistem Informasi Apotek Anugerah Farma</strong></p>
    </div>

</ul>
