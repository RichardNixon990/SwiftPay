@extends('admin.layouts.main')

@section('containerAdmin')

<div class="manageClass-BG manageClass">

</div>
<div class="container manageClass mt-5">
    <h2 class="manageClass mngClass-Header">Manajemen Kelas</h2>
    <blockquote class="bq-mngClass">Disini kamu bisa melihat dan memanajemen data-data siswa yang ada di sekolah ini!</blockquote>
    <div class="card-title-underline"></div>
    <button class="btn btn-primary btn-add mb-3 manageClass" data-bs-toggle="modal" data-bs-target="#adminManageKelas-modalForm">
        + Tambah Kelas
    </button>
    <table class="table manageClass">
        <thead>
            <tr>
                <th class="manageClass">No</th>
                <th class="manageClass">Nama Kelas</th>
                <th class="manageClass">Wali Kelas</th>
                <th class="manageClass">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="manageClass">
                <td class="manageClass">1</td>
                <td class="manageClass">X IPA 1</td>
                <td class="manageClass">Budi Santoso</td>
                <td class="manageClass">
                    <button class="btn-edit manageClass">Edit</button>
                    <button class="btn-delete manageClass">Hapus</button>
                </td>
            </tr>
            <tr class="manageClass">
                <td class="manageClass">2</td>
                <td class="manageClass">X IPS 1</td>
                <td class="manageClass">Rina Kartika</td>
                <td class="manageClass">
                    <button class="btn-edit manageClass">Edit</button>
                    <button class="btn-delete manageClass">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal Form Tambah/Edit Kelas -->
<div class="modal fade" id="adminManageKelas-modalForm" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kelasmu!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Nama Kelas:</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Kelas">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Wali Kelas:</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Wali Kelas">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
