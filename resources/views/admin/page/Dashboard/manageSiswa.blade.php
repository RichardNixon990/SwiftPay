@extends('admin.layouts.main')

@section('containerAdmin')


<div class="manageSiswa-BG">

</div>
<div class="adminManageSiswa-container container container-mngSiswa mt-5">
    <h2 class="mb-3 mngSiswa-Header"> - Management Siswa -</h2>
    <blockquote class="bq-mngSiswa">Disini kamu bisa melihat dan memanajemen data-data siswa yang ada di sekolah ini!</blockquote>
    <div class="card-title-underline"></div>

    <!-- Tombol Tambah Siswa -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#adminManageSiswa-modalForm">+ Tambah Siswa</button>

    <!-- Tabel Siswa -->
    <table class="table table-bordered bg-white adminManageSiswa-table">
        <thead class="adminManageSiswa-table-header">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Total Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Christian</td>
                <td>XI RPL</td>
                <td>Rp 1.000.000</td>
                <td>
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#adminManageSiswa-modalDetail">Detail</button>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#adminManageSiswa-modalForm">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Rina Safitri</td>
                <td>XII TKJ</td>
                <td>Rp 1.500.000</td>
                <td>
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#adminManageSiswa-modalDetail">Detail</button>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#adminManageSiswa-modalForm">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal Form Tambah/Edit -->
<div class="modal fade" id="adminManageSiswa-modalForm" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label name">Nama :</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label name">NISN :</label>
                        <input type="number" class="form-control" placeholder="Masukkan NISN">
                    </div>
                    <div class="mb-3">
                        <label class="form-label name">NIS :</label>
                        <input type="number" class="form-control" placeholder="Masukkan NIS">
                    </div>
                    <div class="mb-3">
                        <label class="form-label name">Alamat :</label>
                        <input type="text" class="form-control" placeholder="Masukkan Alamat">
                    </div>
                    <div class="mb-3">
                        <label class="form-label name">No Telp :</label>
                        <input type="number" class="form-control" placeholder="Masukkan No Telp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label class">Kelas :</label>
                        <select class="form-select">
                            <option>Pilih Kelas</option>
                            <option>X RPL</option>
                            <option>XI RPL</option>
                            <option>XII RPL</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label class">SPP :</label>
                        <select class="form-select">
                            <option>Pilih SPP</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Siswa -->
<div class="modal fade" id="adminManageSiswa-modalDetail" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h5 class="modal-title">Detail Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nama   :</strong> Ahmad Fadilah</p>
                <p><strong>Kelas  :</strong> XI RPL</p>
                <p><strong>Alamat :</strong> Jl. Merdeka No. 45</p>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">View Profile</button>
            </div>
        </div>
    </div>
</div>


@endsection
