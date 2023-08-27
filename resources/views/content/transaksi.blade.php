@extends('layout.index')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 text-gray-800">Data Transaksi</h1>

        </div>
    </div>
    <!-- tambahpenjualan -->
    <div class="modal fade" id="tambahDataModaljual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Penjualan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/tambahjual" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="id_obat">Nama Obat</label>
                            <select class="form-control" id="id_obat" name="id_obat">
                                @foreach ($obat as $item)
                                    <option value="{{ $item->id_obat }}">{{ $item->nama_obat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah"
                                placeholder="Masukkan Jumlah obat">
                        </div>
                        {{-- <div class="form-group">
                            <label for="nama_agen">Agen</label>
                            <input type="text" class="form-control" id="nama_agen" name="nama_agen"
                                placeholder="Masukkan Nama Agen">
                        </div>
                        <div class="form-group">
                            <label for="kontak">Kontak</label>
                            <input type="telp" class="form-control" id="kontak" name="kontak"
                                placeholder="Masukkan Kontak">
                        </div> --}}
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--tabel-->



    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Kontainer Pertama -->
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between text-primary">
                        <div class="d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold w-100">Tabel Penjualan</h6>
                            <div>
                                <a href="#" data-toggle="modal" data-target="#tambahDataModaljual">
                                    <i class="ml-2 fa-solid fa-square-plus fa-xl"></i>
                                </a>
                            </div>
                        </div>
                        <div>
                            <a href="/laporanpenjual"target="_blank"><i class="fa-solid fa-print fa-lg"></i></a>
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
                                        <th>Nama Obat</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th class="w-fit">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penjualan as $item)
                                        <tr class=" ">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td> {{ $item->created_at->format('d F Y') }}

                                            </td>
                                            <td>{{ $item->obat->nama_obat }}
                                            </td>
                                            <td>{{ $item->jumlah }}
                                            </td>
                                            <td>{{ $item->total }}
                                            </td>

                                            <td class="w-fit">
                                                <a href="#" class="" data-toggle="modal-hapus"
                                                    data-target="#logoutModal">
                                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                </a>
                                                <a href="#" class=" "data-toggle="modal-edit"
                                                    data-target="#logoutModal">
                                                    <i class="fa-regular fa-trash-can fa-lg"></i>
                                                </a>
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

            {{-- <div class="col-md-6">
              
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between text-primary">
                        <div class="d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold w-100">Tabel Pembelian</h6>
                            <div>
                                <a href="#" data-toggle="modal" data-target="#tambahDataModalbeli">
                                    <i class="ml-2 fa-solid fa-square-plus fa-xl"></i>
                                </a>
                            </div>
                        </div>
                        <div>
                            <i class="fa-solid fa-print fa-lg"></i>
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
                                        <th>Nama Obat</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th class="w-fit">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tbody>
                                    @foreach ($pengeluaran as $item)
                                        <tr class=" ">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td> {{ $item->created_at->format('d F Y') }}

                                            </td>
                                            <td>{{ $item->obat->nama_obat }}
                                            </td>
                                            <td>{{ $item->jumlah }}
                                            </td>
                                            <td>{{ $item->total }}
                                            </td>

                                            <td class="w-fit">
                                                <a href="#" class="" data-toggle="modal-hapus"
                                                    data-target="#logoutModal">
                                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                </a>
                                                <a href="#" class=" "data-toggle="modal-edit"
                                                    data-target="#logoutModal">
                                                    <i class="fa-regular fa-trash-can fa-lg"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tr>
                                </tbody><!-- Isi data penjualan di sini -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
