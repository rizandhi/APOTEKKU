<ul class="navbar-nav bg-gradient-primary sidebar fixed sidebar-dark accordion" id="accordionSidebar"
    style="z-index: 100;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-text mx-3">PEGAWAI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link" href="/dashboard">
            <i class="fa-solid fa-house-chimney"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKelolaTransaksi"
            aria-expanded="true" aria-controls="collapseKelolaTransaksi">
            <i class="fas fa-fw fa-folder"></i>
            <span>Kelola Transaksi</span>
        </a>
        <div id="collapseKelolaTransaksi" class="collapse" aria-labelledby="headingKelolaTransaksi"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/transaksi">Transaksi</a>
                <a class="collapse-item" href="#">Rekap</a>
            </div>
        </div>
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
    <hr class="sidebar-divider d-none d-md-block">
    <div class="nav-item d-flex py-2 mb-2 justify-content-center">
        <a href="#" class="btn btn-outline-light py-1" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-rotate-270"></i> <span>Logout</span>
        </a>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="/logout" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const logoutButton = document.querySelector("#logoutButton");

            logoutButton.addEventListener("click", function() {
                window.location.href = "/logout";
            });
        });
    </script>

    <div class="sidebar-card d-none d-lg-flex">
        <p class="text-center mb-2"><strong>Sistem Informasi Apotek Anugerah Farma</strong></p>
    </div>


</ul>
