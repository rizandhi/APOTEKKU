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
                    <form method="POST" action="/tambahobat">
                        @csrf
                        <div class="form-group">
                            <label for="id_kategori">Kategori</label>
                            <select class="form-control" id="id_kategori" name="id_kategori">
                                @foreach ($kategori as $category)
                                    <option value="{{ $category->id_kategori }}">{{ $category->kategori }}</option>
                                @endforeach
                            </select>
                            {{-- <select class="form-control" id="id_kategori" name="id_kategori">
                                <option value="1">Tablet</option>
                                <option value="2">Sirop</option>
                                </select> --}}
                        </div>
                        {{-- <div class="form-group">
                            <label for="kode_obat">Kode Obat</label>
                            <input type="text" class="form-control" id="kode_obat" name="kode_obat" required>
                        </div> --}}
                        <div class="form-group">
                            <label for="nama_obat">Nama Obat</label>
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" >
                        </div>
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="number" class="form-control" id="harga_jual" name="harga_jual" >
                        </div>
                        <div class="form-group">
                            <label for="harga_beli">Harga Beli</label>
                            <input type="number" class="form-control" id="harga_beli" name="harga_beli" >
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" >
                        </div>
                        <div class="form-group">
                            <label for="tgl_exp">Tanggal Exp</label>
                            <input type="date" class="form-control" id="tgl_exp" name="tgl_exp" >
                        </div>
                        <div class="form-group">
                            <label for="id_suplier">Suplier</label>
                            <select class="form-control" id="id_suplier" name="id_suplier">
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id_suplier }}">{{ $supplier->nama_suplier	 }}</option>
                                @endforeach
                                {{-- <option value="5">PT.Sjahtera</option>
                                <option value="6">PT.Kimia</option> --}}
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                        
                </div>
                
            </div>
        </div>
    </div>
    
    <!--edit-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form id="editForm1" method="POST">
                        @csrf  
                        <input type="hidden" name="edit_obat_id" id="edit_obat_id">
                        <div class="form-group">
                            <label for="edit_id_kategori">Kategori</label>
                            <select class="form-control" id="edit_id_kategori" name="edit_id_kategori">
                                @foreach ($kategori as $category)
                                    <option value="{{ $category->id_kategori }}">{{ $category->kategori }}</option>
                                @endforeach
                            </select>
                            {{-- <select class="form-control" id="id_kategori" name="id_kategori">
                                <option value="1">Tablet</option>
                                <option value="2">Sirop</option>
                                </select> --}}
                        </div>
                        {{-- <div class="form-group">
                            <label for="kode_obat">Kode Obat</label>
                            <input type="text" class="form-control" id="kode_obat" name="kode_obat" required>
                        </div> --}}
                        <div class="form-group">
                            <label for="edit_nama_obat">Nama Obat</label>
                            <input type="text" class="form-control" id="edit_nama_obat" name="edit_nama_obat" >
                        </div>
                        <div class="form-group">
                            <label for="edit_harga_jual">Harga Jual</label>
                            <input type="number" class="form-control" id="edit_harga_jual" name="edit_harga_jual" >
                        </div>
                        <div class="form-group">
                            <label for="edit_jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="edit_jumlah" name="edit_jumlah" >
                        </div>
                        <div class="form-group">
                            <label for="edit_tgl_exp">Tanggal Exp</label>
                            <input type="date" class="form-control" id="edit_tgl_exp" name="edit_tgl_exp" >
                        </div>
                        <div class="form-group">
                            <label for="edit_id_suplier">Suplier</label>
                            <select class="form-control" id="edit_id_suplier" name="edit_id_suplier">
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id_suplier }}">{{ $supplier->nama_suplier	 }}</option>
                                @endforeach
                                {{-- <option value="5">PT.Sjahtera</option>
                                <option value="6">PT.Kimia</option> --}}
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="button" id="simpanPerubahan1">Simpan Perubahan</button>
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
                                <table class="table table-bordered dataTable" id="dataTable1" width="100%"
                                    cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                    style="width: 100%;">
                                    <tbody>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable2" width="100%"
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
                                                                <button class="editBtn btn text-primary p-0 m-0"
                                                                    data-id="{{ $item->id_obat }}" data-toggle="modal"
                                                                    data-target="#editModal">
                                                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                                </button>
                                                                {{-- <a href="#" class=" ">
                                                                    <i class="fa-regular fa-trash-can fa-lg"></i>
                                                                </a> --}}
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

                            {{-- <div class="row">
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
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll(".editBtn");
            const editModal = document.querySelector("#editModal");
            const editForm1 = editModal.querySelector("#editForm1");
            const editObatnameInput = editForm1.querySelector("#edit_nama_obat");
            const editIdKategoriInput = editForm1.querySelector("#edit_id_kategori");
            const editHargaInput = editForm1.querySelector("#edit_harga_jual");
            const editJumlahInput = editForm1.querySelector("#edit_jumlah");
            const editXPInput = editForm1.querySelector("#edit_tgl_exp");
            const editsuplierInput = editForm1.querySelector("#edit_id_suplier");
            const editObatIdInput = editForm1.querySelector("#edit_obat_id");

            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const obatId = button.getAttribute("data-id");

                    // Mengambil data dari suplier berdasarkan ID yang diklik
                    const obatData = @json($obat->keyBy('id_obat'));

                    if (obatData[obatId]) {
                        const obat = obatData[obatId];
                        editObatIdInput.value = obatId; // Set obat ID for form submission
                        editObatnameInput.value = obat.nama_obat;
                        editIdKategoriInput.value = obat.id_kategori;
                        editHargaInput.value = obat.harga_jual;
                        editJumlahInput.value = obat.jumlah;
                        editXPInput.value = obat.tgl_exp;
                        editsuplierInput.value = obat.id_suplier;
                    }
                });
            });
            const simpanPerubahanButton = editModal.querySelector("#simpanPerubahan1");
            simpanPerubahanButton.addEventListener("click", function() {
                editForm1.action = "/UpdateObat/" + editObatIdInput.value;
                // editForm1.method = "POST"; // Set the form method to POST
                editForm1.submit(); // Submit the form
            });
        });
    </script>
@endsection
