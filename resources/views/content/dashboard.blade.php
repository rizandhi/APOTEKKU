@extends('layout.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
    </div>
    <!-- Content Row -->
    <div class="px-4 row">
        <!-- Persediaan Obat Hari Ini-->
        <div class="col-xl-3 col-md-10 mb-9">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
                                Persediaan Obat</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalJumlahObat }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Obat Keluar Hari Ini -->
        <div class="col-xl-3 col-md-10 mb-9">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-2">
                                Jumlah Obat Tejual Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalObatTerjualHariIni }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Obat Masuk Hari Ini -->
        <div class="col-xl-3 col-md-10 mb-9">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-2">
                                Jumlah Obat < 10 </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalObatStokKurangDari10 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-10 mb-9">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-2">
                                Pendapatan Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ $totalPendapatanHariIni }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-4 row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Daftar Obat dengan Jumlah Kurang dari 10
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Obat</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obatStokKurangDari10 as $obat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $obat->nama_obat }}</td>
                                        <td>{{ $obat->jumlah }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
