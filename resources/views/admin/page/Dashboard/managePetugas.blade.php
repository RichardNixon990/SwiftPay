@extends('admin.layouts.main')

@section('containerAdmin')
    <div class="managePetugas-BG">

    </div>
    <div class="managePetugas-container container container-mngPetugas mt-5">
        <h2 class="mb-3 mngPetugas-Header"> - Management Petugas -</h2>
        <blockquote class="bq-mngPetugas">Disini kamu bisa melihat dan memanajemen data-data Petugas yang ada di sekolah ini!
        </blockquote>
        <div class="card-title-underline"></div>

        <!-- Tombol Tambah Siswa -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#managePetugas-modalForm">+ Tambah
            Petugas</button>

        <!-- Tabel Siswa -->
        <table class="table table-bordered bg-white managePetugas-table">
            <thead class="managePetugas-table-header">
                <tr>
                    <th>No</th>
                    <th>Usename</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($petugas as $atmint)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $atmint->username }}</td>
                        <td>{{ $atmint->nama_petugas }}</td>
                        <td>{{ $atmint->level }}</td>
                        <td>
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                data-bs-target="#managePetugas-modalDetail-{{ $atmint->id }}">Detail</button>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#managePetugas-modalFormEdit"
                                onclick="editPetugas({{ $atmint->id }}, '{{ $atmint->username }}', '{{ $atmint->nama_petugas }}', '{{ $atmint->level }}')"
                                >Edit</button>
                            <a href="{{ route('admin.hapusPetugas', $atmint->id) }}"
                                onclick="return confirm('Apakah kamu yakin ingin menghapus Petugas ini?');">
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $petugas->links('pagination::bootstrap-5') }}
    </div>

    <!-- Modal Form Tambah/Edit -->
    <div class="modal fade" id="managePetugas-modalForm" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Petugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.tambahPetugas') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label name">Nama :</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Petugas" name="nama_petugas">
                        </div>
                        <div class="mb-3">
                            <label class="form-label name">Username :</label>
                            <input type="text" class="form-control" placeholder="Masukkan Username" name="username">
                        </div>
                        <div class="mb-3">
                            <label class="form-label name">Password :</label>
                            <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label name">Level :</label>
                            <select class="form-select" name="level">
                                <option selected disabled>Pilih Level</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Form Edit -->
    <div class="modal fade" id="managePetugas-modalFormEdit" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Form Petugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.updatePetugas') }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="editid" id="editid">
                        <div class="mb-3">
                            <label class="form-label name">Nama :</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Petugas" name="nama_petugas" id="edit-nama" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label name">Username :</label>
                            <input type="text" class="form-control" placeholder="Masukkan Username" name="username" id="edit-username">
                        </div>
                        <div class="mb-3">
                            <label class="form-label name">Password :</label>
                            <input type="password" class="form-control" placeholder="Update Password, Jika tidak kosongkan" name="password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label name">Level :</label>
                            <select class="form-select" name="level" id="edit-level">
                                <option selected disabled>Pilih Level</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($petugas as $atmint)
    <!-- Modal Detail Petugas -->
    <div class="modal fade" id="managePetugas-modalDetail-{{ $atmint->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-white">
                    <h5 class="modal-title">Detail Petugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Username :</strong> {{ $atmint->username }}</p>
                    <p><strong>Nama :</strong> {{ $atmint->nama_petugas }}</p>
                    <p><strong>Level :</strong> {{ $atmint->level }}</p>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">View Profile</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <script>
        function editPetugas(id, username, nama, level) {
            console.log([id, username, nama, level]);

            document.getElementById("editid").value = id;
            document.getElementById("edit-username").value = username;
            document.getElementById("edit-nama").value = nama;
            document.getElementById("edit-level").value = level;
        }
    </script>
@endsection
