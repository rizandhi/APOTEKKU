<ul class="navbar-nav bg-gradient-primary sidebar fixed sidebar-dark accordion" id="accordionSidebar"
    style="z-index: 100;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-text mx-3">
            @if (Auth::user()->level === 'User')
                PEGAWAI
            @elseif (Auth::user()->level === 'Admin')
                APOTEKER
            @endif
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/dashboard">
            <i class="fa-solid fa-house-chimney"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Menu untuk peran admin -->
    @if (Auth::user()->level === 'User')
        <!-- Heading -->
        <div class="sidebar-heading">
            DATA APOTEK
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataApotek"
                aria-expanded="true" aria-controls="collapseDataApotek">
                <i class="fas fa-fw fa-folder"></i>
                <span>Kelola Data</span>
            </a>
            <div id="collapseDataApotek" class="collapse" aria-labelledby="headingDataApotek"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner">
                    <a class="collapse-item" href="/persediaan">Persediaan</a>
                    {{-- <a class="collapse-item" href="/suplier">Supplier</a> --}}
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
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKelolaTransaksi"
                aria-expanded="true" aria-controls="collapseKelolaTransaksi">
                <i class="fas fa-fw fa-folder"></i>
                <span>Kelola Transaksi</span>
            </a>
            <div id="collapseKelolaTransaksi" class="collapse" aria-labelledby="headingKelolaTransaksi"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/transaksi">Transaksi</a>
                    {{-- <a class="collapse-item" href="#">Rekap</a> --}}
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        {{-- <!-- Heading -->
        <div class="sidebar-heading">
            PENGATURAN
        </div>
        <li class="nav-item">
            <a class="nav-link" href="/user">
                <i class="fa-solid fa-gear"></i>
                <span>User</span>
            </a>
        </li> --}}
    @endif
    @if (Auth::user()->level === 'Admin')
        <!-- Heading -->
        <div class="sidebar-heading">
            DATA APOTEK
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="/suplier">
                <i class="fas fa-fw fa-folder"></i>
                <span>Kelola Suplier</span>
            </a>

        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            LAPORAN
        </div>
        <li class="nav-item">
            <a class="nav-link " href="/rekap">
                <i class="fas fa-fw fa-folder"></i>
                <span>Rekap Transaksi</span>
            </a>

        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            PENGATURAN
        </div>
        <li class="nav-item">
            <a class="nav-link" href="/user">
                <i class="fa-solid fa-gear"></i>
                <span>User</span>
            </a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block ">
    @endif
    
    <div class="nav-item d-flex py-2 mb-2 justify-content-center">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" onclick="return confirm('Yakin ingin logout?')"
                class="btn btn-outline-light py-1"><i class="fas fa-sign-out-alt fa-rotate-270"></i> Logout
            </button>
        </form>
        
    </div>

    <!-- Modal Logout -->




    <div class="sidebar-card d-none d-lg-flex">
        <p class="text-center mb-2"><strong>Sistem Informasi Apotek Anugerah Farma</strong></p>
    </div>

</ul>
