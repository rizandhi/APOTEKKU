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

    <!-- Modal Tambah -->
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
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit" id="simpanData">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST">
                        @csrf
                        <input type="hidden" name="edit_user_id" id="edit_user_id">
                        <div class="form-group">
                            <label for="edit_username">Username</label>
                            <input type="text" class="form-control" id="edit_username" name="edit_username">
                        </div>
                        <div class="form-group">
                            <label for="edit_password">Password</label>
                            <input type="text" class="form-control" id="edit_password" name="edit_password">
                        </div>
                        <div class="form-group">
                            <label for="edit_level">Level</label>
                            <select name="edit_level" id="edit_level" class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
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

    <!-- Tabel -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between text-primary ">
                <h6 class="m-0 font-weight-bold w-100">Tabel User</h6>
                <div><i class="fa-solid fa-print fa-lg"></i></div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->confirmasi_password }}</td>
                                    <td>{{ $item->level }}</td>
                                    <td class="w-fit d-flex justify-end">
                                        <button class="editBtn btn text-primary p-0 m-0" data-id="{{ $item->id_user }}"
                                            data-toggle="modal" data-target="#editModal">
                                            <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                        </button>
                                        <form action="{{ route('deleteUser', ['id_user' => $item->id_user]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn text-primary p-0 m-0"
                                                onclick="return confirm('Yakin ingin hapus data?')">
                                                <i class="fa-solid fa-trash-can fa-lg"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll(".editBtn");
            const editModal = document.querySelector("#editModal");
            const editForm = editModal.querySelector("#editForm");
            const editUsernameInput = editModal.querySelector("#edit_username");
            const editPasswordInput = editModal.querySelector("#edit_password");
            const editLevelInput = editModal.querySelector("#edit_level");
            const editUserIdInput = editModal.querySelector("#edit_user_id");

            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const userId = button.getAttribute("data-id");

                    // Mengambil data dari user1 berdasarkan ID yang diklik
                    const user1Data = @json($user1->keyBy('id_user'));

                    if (user1Data[userId]) {
                        const userData = user1Data[userId];
                        editUserIdInput.value = userId; // Set user ID for form submission
                        editUsernameInput.value = userData.username;
                        editPasswordInput.value = userData.confirmasi_password;
                        editLevelInput.value = userData.level;
                    }
                });
            });

            const simpanPerubahanButton = editModal.querySelector("#simpanPerubahan");
            simpanPerubahanButton.addEventListener("click", function() {
                editForm.action = "/UpdateUser/" + editUserIdInput.value;
                editForm.submit();
            });
        });
    </script>
@endsection
