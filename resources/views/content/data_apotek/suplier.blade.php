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
    <!-- Begin Page Content -->
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
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                        </div>
                        <div class="form-group">
                            <label for="nama_agen">Agen</label>
                            <input type="text" class="form-control" id="nama_agen" name="nama_agen" placeholder="Masukkan Nama Agen">
                        </div>
                        <div class="form-group">
                            <label for="kontak">Kontak</label>
                            <input type="text" class="form-control" id="kontak" name="kontak" placeholder="Masukkan Kontak">
                        </div>
                        <div class="">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button> --}}
                    {{-- <button class="btn btn-primary" type="submit">Simpan</button> --}}
                </div>

            </div>
        </div>
    </div>
    <!--edit-->
    <div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form>
                        <div class="form-group">
                            <label for="nama_suplier_modal">Nama</label>
                            <input type="text" class="form-control" id="nama_suplier_modal" name="nama_suplier"
                                placeholder="Masukkan Nama Suplier">
                        </div>
                        <div class="form-group">
                            <label for="alamat_modal">Alamat</label>
                            <input type="text" class="form-control" id="alamat_modal" name="alamat" placeholder="Masukkan Alamat">
                        </div>
                        <div class="form-group">
                            <label for="agen_modal">Agen</label>
                            <input type="text" class="form-control" id="agen_modal" name="nama_agen" placeholder="Masukkan Nama Agen">
                        </div>
                        <div class="form-group">
                            <label for="kontak_modal">Kontak</label>
                            <input type="number" class="form-control" id="kontak_modal" name="kontak" placeholder="Masukkan Kontak">
                        </div>
                        <input type="hidden" id="suplier_id_modal">
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="button" id="updateData">Simpan Perubahan</button>
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
                                                            <td class="w-fit">
                                                                <a href="#" class="editBtn"
                                                                    data-id="{{ $item->id_suplier }}" data-toggle="modal"
                                                                    data-target="#editDataModal">
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
    <script>
        // JavaScript untuk menampilkan data supplier dalam modal
        $(document).ready(function() {
            $('.editBtn').on('click', function() {
                var suplierId = $(this).data('id');

                // Lakukan permintaan AJAX untuk mengambil data supplier berdasarkan ID
                $.ajax({
                    url: '/get-suplier/' + suplierId, // Ganti dengan URL yang sesuai
                    method: 'GET',
                    success: function(response) {
                        // Isi input dalam modal dengan data yang diterima dari server
                        $('#nama_suplier_modal').val(response.nama_suplier);
                        $('#alamat_modal').val(response.alamat);
                        $('#agen_modal').val(response.nama_agen);
                        $('#kontak_modal').val(response.kontak);
                        $('#suplier_id_modal').val(response.id_suplier);
                    }
                });
            });

            // Update data ketika tombol "Simpan Perubahan" diklik
            $('#updateData').on('click', function() {
                var suplierId = $('#suplier_id_modal').val();
                var namaSuplier = $('#nama_suplier_modal').val();
                var alamat = $('#alamat_modal').val();
                var namaAgen = $('#agen_modal').val();
                var kontak = $('#kontak_modal').val();

                // Lakukan permintaan AJAX untuk mengirim data perubahan ke server
                $.ajax({
                    url: '/update-suplier/' + suplierId, // Ganti dengan URL yang sesuai
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        nama_suplier: namaSuplier,
                        alamat: alamat,
                        nama_agen: namaAgen,
                        kontak: kontak
                    },
                    success: function(response) {
                        // Lakukan tindakan setelah data berhasil diperbarui
                        // Misalnya, tampilkan notifikasi atau segarkan tabel data
                        // ...
                        $('#editDataModal').modal('hide'); // Tutup modal setelah sukses
                    }
                });
            });

        });
    </script>

@endsection
