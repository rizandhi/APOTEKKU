@extends('layout.index')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                data-target="#tambahDataModal">
                <i class="fas fa-button fa-sm text-white-50"></i> Tambah Obat</a>
            <h1 class="h3 mb-0 text-gray-800">Data Obat</h1>

        </div>
    </div>
    <!-- Begin Page Content -->
    <!-- modal tambah -->
    <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Obat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nama_obat">Nama Obat</label>
                            <input type="text" class="form-control" id="nama_obat" placeholder="Masukkan Nama Obat">
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" id="menu_pilihan">
                                <option value="ya">Harus resep dokter</option>
                                <option value="tidak">Bebas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Jenis Obat</label>
                            <select class="form-control" id="menu_pilihan">
                                <option value="ya">Tablet</option>
                                <option value="tidak">Kapsul</option>
                                <option value="tidak">Salep</option>
                                <option value="tidak">Sirup</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="number" class="form-control" id="harga_jual" placeholder="Masukkan Stock">
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock </label>
                            <input type="text" class="form-control" id="stock" placeholder="Maskkan Stock"
                                onfocus="clearPlaceholder()" onblur="restorePlaceholder()">
                        </div>
                        <div class="form-group">
                            <label for="suplier">Suplier</label>
                            <input type="text" class="form-control" id="suplier" placeholder="Masukkan Suplier">
                        </div>
                        <div class="form-group">
                            <label for="exp">Exp</label>
                            <input type="date" class="form-control" id="stock" placeholder="Masukkan Tanggal Exp">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="button" id="simpanData">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal edit -->
    <div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Obat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nama_obat">Nama Obat</label>
                            <input type="text" class="form-control" id="nama_obat" placeholder="Masukkan Nama Obat">
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" id="menu_pilihan">
                                <option value="ya">Harus resep dokter</option>
                                <option value="tidak">Bebas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Jenis Obat</label>
                            <select class="form-control" id="menu_pilihan">
                                <option value="ya">Tablet</option>
                                <option value="tidak">Kapsul</option>
                                <option value="tidak">Salep</option>
                                <option value="tidak">Sirup</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="number" class="form-control" id="harga_jual" placeholder="Masukkan Stock">
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock </label>
                            <input type="text" class="form-control" id="stock" placeholder="Maskkan Stock"
                                onfocus="clearPlaceholder()" onblur="restorePlaceholder()">
                        </div>
                        <div class="form-group">
                            <label for="suplier">Suplier</label>
                            <input type="text" class="form-control" id="suplier" placeholder="Masukkan Suplier">
                        </div>
                        <div class="form-group">
                            <label for="exp">Exp</label>
                            <input type="date" class="form-control" id="stock"
                                placeholder="Masukkan Tanggal Exp">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="button" id="simpanData">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!--tabel-->
    <div class="container-fluid ">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between text-primary ">
                <h6 class="m-0 font-weight-bold w-100">Table Data Persediaan Obat Apotek</h6>
                <div><i class="fa-solid fa-print fa-lg"></i></div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                    cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                    style="width: 100%;">
                                    <tbody>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Obat</th>
                                                        <th>Nama Obat</th>
                                                        <th>Kategori</th>
                                                        <th>Harga Jual</th>
                                                        <th>Stok</th>
                                                        <th>Suplier</th>
                                                        <th>Exp</th>
                                                        <th class="w-fit">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($obat as $item)
                                                        <tr class=" ">
                                                            <td>
                                                                {{ $item->kode_obat }}
                                                            </td>
                                                            <td> {{ $item->nama_obat }}
                                                            </td>
                                                            <td>{{ $item->kategori->kategori }}
                                                            </td>
                                                            <td>Rp. {{ number_format($item->harga_jual, 0, ',', '.') }}</td>

                                                            <td>{{ $item->jumlah }}
                                                            </td>
                                                            <td>{{ $item->suplier->nama_suplier }}
                                                            </td>
                                                            <td>{{ \Carbon\Carbon::parse($item->tgl_exp)->formatLocalized('%d %B %Y') }}
                                                            </td>
                                                            <td class="w-fit">
                                                                <a href="#" class=" " data-toggle="modal"
                                                                    data-target="#editDataModal">
                                                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                                </a>
                                                                <a href="#" class=" ">
                                                                    <i class="fa-regular fa-trash-can fa-lg"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 57 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled"
                                                id="dataTable_previous">
                                                <a href="#" aria-controls="dataTable" data-dt-idx="0"
                                                    tabindex="0" class="page-link">Previous</a>
                                            </li>
                                            <li class="paginate_button page-item active"><a href="#"
                                                    aria-controls="dataTable" data-dt-idx="1" tabindex="0"
                                                    class="page-link">1</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                    aria-controls="dataTable" data-dt-idx="2" tabindex="0"
                                                    class="page-link">2</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                    aria-controls="dataTable" data-dt-idx="3" tabindex="0"
                                                    class="page-link">3</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                    aria-controls="dataTable" data-dt-idx="4" tabindex="0"
                                                    class="page-link">4</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                    aria-controls="dataTable" data-dt-idx="5" tabindex="0"
                                                    class="page-link">5</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                    aria-controls="dataTable" data-dt-idx="6" tabindex="0"
                                                    class="page-link">6</a></li>
                                            <li class="paginate_button page-item next" id="dataTable_next"><a
                                                    href="#" aria-controls="dataTable" data-dt-idx="7"
                                                    tabindex="0" class="page-link">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
