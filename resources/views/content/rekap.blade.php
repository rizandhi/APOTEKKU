@extends('layout.index')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 text-gray-800">Data Transaksi</h1>

        </div>
    </div>
    <div class="container-fluid px-4">
        <div class="row ">
            <div class="col-md-12">
                <!-- Kontainer Pertama -->
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between text-primary">
                        <div class="d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold w-100">Rekap Transaksi</h6>
                        </div>
                        <div>
                            <a href="/rekapCetak"target="_blank"><i class="fa-solid fa-print fa-lg"></i></a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Arus</th>
                                        <th>Nama Obat</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rekap as $item)
                                        <tr class=" ">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td> {{ $item->created_at->format('d F Y') }}

                                            </td>
                                            <td>{{ $item->jenis }}
                                            </td>
                                            <td>{{ $item->obat->nama_obat }}
                                            </td>
                                            <td>{{ $item->jumlah }}
                                            </td>
                                            <td>{{ $item->harga }}
                                            </td>                                            
                                        </tr>
                                    @endforeach

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
