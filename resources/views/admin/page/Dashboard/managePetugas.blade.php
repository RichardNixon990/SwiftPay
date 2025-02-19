@extends('admin.layouts.main')

@section('containerAdmin')


<div class="managePetugas-BG">

</div>
<div class="managePetugas-container container container-mngPetugas mt-5">
    <h2 class="mb-3 mngPetugas-Header"> - Management Petugas -</h2>
    <blockquote class="bq-mngPetugas">Disini kamu bisa melihat dan memanajemen data-data Petugas yang ada di sekolah ini!</blockquote>
    <div class="card-title-underline"></div>

    <!-- Tombol Tambah Siswa -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#managePetugas-modalForm">+ Tambah Petugas</button>

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
            <tr>
                <td>1</td>
                <td>Christ</td>
                <td>Christian</td>
                <td>Petugas</td>
                <td>
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#managePetugas-modalDetail">Detail</button>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#managePetugas-modalForm">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
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
                <form>
                    <div class="mb-3">
                        <label class="form-label name">Nama :</label>
                        <input type="number" class="form-control" placeholder="Masukkan Nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label name">Username :</label>
                        <input type="text" class="form-control" placeholder="Masukkan Username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label name">Password :</label>
                        <input type="number" class="form-control" placeholder="Masukkan Password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label name">Level :</label>
                        <input type="number" class="form-control" placeholder="Masukkan Level Petugas">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Siswa -->
<div class="modal fade" id="managePetugas-modalDetail" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h5 class="modal-title">Detail Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Username   :</strong> Christ</p>
                <p><strong>Nama  :</strong> Chritian</p>
                <p><strong>Level :</strong> Petugas</p>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">View Profile</button>
            </div>
        </div>
    </div>
</div>

@endsection
