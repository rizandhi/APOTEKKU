@extends('layout.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                data-target="#tambahDataModal">
                <i class="fas fa-button fa-sm text-white-50"></i> Tambah Suplier</a>
            <h1 class="h3 mb-0 text-gray-800">Data Suplier</h1>

        </div>
    </div>
    <!-- tambah data-->
    <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Suplier</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/tambahsuplier" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_suplier">Nama</label>
                            <input type="text" class="form-control" id="nama_suplier" name="nama_suplier"
                                placeholder="Masukkan Nama Suplier">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Masukkan Alamat">
                        </div>
                        <div class="form-group">
                            <label for="nama_agen">Agen</label>
                            <input type="text" class="form-control" id="nama_agen" name="nama_agen"
                                placeholder="Masukkan Nama Agen">
                        </div>
                        <div class="form-group">
                            <label for="kontak">Kontak</label>
                            <input type="telp" class="form-control" id="kontak" name="kontak"
                                placeholder="Masukkan Kontak">
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--edit-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Suplier</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST">
                        @csrf
                        <input type="hidden" name="edit_suplier_id" id="edit_suplier_id">
                        <div class="form-group">
                            <label for="edit_nama_suplier">Nama</label>
                            <input type="text" class="form-control" id="edit_nama_suplier" name="edit_nama_suplier">
                        </div>
                        <div class="form-group">
                            <label for="edit_alamat">Alamat</label>
                            <input type="text" class="form-control" id="edit_alamat" name="edit_alamat"
                                placeholder="Masukkan Alamat">
                        </div>
                        <div class="form-group">
                            <label for="edit_nama_agen">Agen</label>
                            <input type="text" class="form-control" id="edit_nama_agen" name="edit_nama_agen"
                                placeholder="Masukkan Nama Agen">
                        </div>
                        <div class="form-group">
                            <label for="edit_kontak">Kontak</label>
                            <input type="tel" class="form-control" id="edit_kontak" name="edit_kontak"
                                placeholder="Masukkan Kontak">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="button" id="simpanPerubahan">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>

    <!--tabel-->
    <div class="container-fluid ">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between text-primary ">
                <h6 class="m-0 font-weight-bold w-100">Daftar Suplier Obat Apotek</h6>
                <div class="d-flex justify-content-end">
                    <a href="javascript:void(0);" class="btn btn-primary" id="printButton">Cetak</a>
                </div>
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
                                                        <th>No</th>
                                                        <th>Nama Suplier</th>
                                                        <th>Alamat</th>
                                                        <th>Agen</th>
                                                        <th>Kontak</th>
                                                        <th class="w-fit">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($suplier as $item)
                                                        <tr class=" ">
                                                            <td>
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td> {{ $item->nama_suplier }}
                                                            </td>
                                                            <td>{{ $item->alamat }}
                                                            </td>
                                                            <td>{{ $item->nama_agen }}
                                                            </td>
                                                            <td>{{ $item->kontak }}
                                                            </td>
                                                            <td class="w-fit d-flex justify-end">
                                                                <button class="editBtn btn text-primary p-0 m-0"
                                                                    data-id="{{ $item->id_suplier }}" data-toggle="modal"
                                                                    data-target="#editModal">
                                                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                                </button>
                                                                {{-- <form
                                                                    action="{{ route('deleteSuplier', ['id_suplier' => $item->id_suplier]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit"
                                                                        class="btn text-primary p-0 m-0"
                                                                        onclick="return confirm('Yakin ingin hapus data?')">
                                                                        <i class="fa-solid fa-trash-can fa-lg"></i>
                                                                    </button> --}}
                                                    @endforeach

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const printButton = document.querySelector("#printButton");

            printButton.addEventListener("click", function() {
                window.print();
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll(".editBtn");
            const editModal = document.querySelector("#editModal");
            const editForm = editModal.querySelector("#editForm");
            const editSupliernameInput = editForm.querySelector("#edit_nama_suplier");
            const editAlamatInput = editForm.querySelector("#edit_alamat");
            const editNamaAgenInput = editForm.querySelector("#edit_nama_agen");
            const editSuplierIdInput = editForm.querySelector("#edit_suplier_id");

            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const suplierId = button.getAttribute("data-id");

                    // Mengambil data dari suplier berdasarkan ID yang diklik
                    const suplierData = @json($suplier->keyBy('id_suplier'));

                    if (suplierData[suplierId]) {
                        const suplier = suplierData[suplierId];
                        editSuplierIdInput.value = suplierId; // Set suplier ID for form submission
                        editSupliernameInput.value = suplier.nama_suplier;
                        editAlamatInput.value = suplier.alamat;
                        editNamaAgenInput.value = suplier.nama_agen;
                    }
                });
            });
            const simpanPerubahanButton = editModal.querySelector("#simpanPerubahan");
            simpanPerubahanButton.addEventListener("click", function() {
                editForm.action = "/UpdateSuplier/" + editSuplierIdInput.value;
                editForm.method = "POST"; // Set the form method to POST
                editForm.submit(); // Submit the form
            });
        });
    </script>
@endsection
