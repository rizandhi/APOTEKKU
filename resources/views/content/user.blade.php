@extends('layout.index')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                data-target="#tambahDataModal">
                <i class="fas fa-button fa-sm text-white-50"></i> Tambah User</a>
            <h1 class="h3 mb-0 text-gray-800">Data User</h1>

        </div>
    </div>
    <!-- Begin Page Content -->
    <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/tambahuser" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Masukkan Nama Suplier">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password"
                                placeholder="Masukkan Alamat">
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level">
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>

                        {{-- <div class="">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div> --}}

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit" id="simpanData">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--tabel-->
    <div class="container-fluid ">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between text-primary ">
                <h6 class="m-0 font-weight-bold w-100">Tabel User</h6>
                <div><i class="fa-solid fa-print fa-lg"></i></div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                    role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <tbody>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Username</th>
                                                        <th>Password</th>
                                                        <th>Level</th>
                                                        <th class="w-fit">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($user1 as $item)
                                                        <tr class=" ">
                                                            <td>
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td> {{ $item->username }}
                                                            </td>
                                                            <td>{{ $item->confirmasi_password }}
                                                            </td>
                                                            <td>{{ $item->level }}
                                                            </td>
                                                            <td class="w-fit d-flex justify-end">
                                                                <button class="editBtn btn text-primary p-0 m-0"
                                                                    data-id="{{ $item->id_user }}" data-toggle="modal"
                                                                    data-target="#editModal">
                                                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                                </button>
                                                                <form action="/deleteUser/{{ $item->id_user }}"
                                                                    method="post">

                                                                    @csrf
                                                                    @method('delete')

                                                                    <button type="submit" class="btn text-primary  p-0 m-0"
                                                                        onclick="return confirm('Yakin ingin hapus data?')">
                                                                        <i class="fa-solid fa-trash-can fa-lg"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Edit
                                                                        User</h5>
                                                                    <button class="close" type="button"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('UpdateUser.update', $item->id_user) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="edit_user_id"
                                                                            id="edit_user_id">
                                                                        <div class="form-group">
                                                                            <label for="edit_username">Username</label>
                                                                            <input type="text" class="form-control"
                                                                                id="edit_username" name="edit_username"
                                                                                value="{{ old('edit_username', $item->username) }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="edit_password">Password</label>
                                                                            <input type="text" class="form-control"
                                                                                id="edit_password" name="edit_password"
                                                                                value="{{ old('edit_password', $item->confirmasi_password) }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="edit_level">Level</label>
                                                                            <select name="edit_level" id="edit_level"
                                                                                class="form-control">
                                                                                <option value="Admin">Admin</option>
                                                                                <option value="User">User</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button class="btn btn-primary" type="submit">Simpan
                                                                        Perubahan</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>



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
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll(".editBtn");
            const editModal = document.querySelector("#editModal");
            const editUsernameInput = editModal.querySelector("#edit_username");
            const editPasswordInput = editModal.querySelector("#edit_password");
            const editLevelInput = editModal.querySelector("#edit_level");

            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const userId = button.getAttribute("data-id");

                    // Anda bisa mengganti URL sesuai dengan endpoint Anda
                    fetch(`/user/edit/${userId}`)
                        .then(response => response.json())
                        .then(data => {
                            editUsernameInput.value = data.username;
                            editPasswordInput.value = data.confirmasi_password;
                            editLevelInput.value = data.level;
                        })
                        .catch(error => console.error("Error fetching data:", error));
                });
            });
        });
    </script>
@endsection
