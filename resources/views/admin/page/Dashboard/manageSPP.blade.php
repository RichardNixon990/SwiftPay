@extends('admin.layouts.main')

@section('containerAdmin')

<div class="manageSPP-BG manageSPP">

</div>
<div class="container manageSPP mt-5">
    <h2 class="manageSPP mngSPP-Header">Manajemen SPP</h2>
    <blockquote class="bq-mngSPP">Di sini kamu bisa melihat dan memanajemen data pembayaran SPP di sekolah ini!</blockquote>
    <div class="card-title-underline"></div>
    <button class="btn btn-primary btn-add mb-3 manageSPP" data-bs-toggle="modal" data-bs-target="#adminManageSPP-modalForm">
        + Tambah SPP
    </button>
    <table class="table manageSPP">
        <thead>
            <tr>
                <th class="manageSPP">No</th>
                <th class="manageSPP">Tahun Ajaran</th>
                <th class="manageSPP">Nominal</th>
                <th class="manageSPP">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="manageSPP">
                <td class="manageSPP">1</td>
                <td class="manageSPP">2023/2024</td>
                <td class="manageSPP">Rp 1.500.000</td>
                <td class="manageSPP">
                    <button class="btn-edit manageSPP" data-bs-toggle="modal" data-bs-target="#adminManageSPP-modalForm">Edit</button>
                    <button class="btn-delete manageSPP">Hapus</button>
                </td>
            </tr>
            <tr class="manageSPP">
                <td class="manageSPP">2</td>
                <td class="manageSPP">2024/2025</td>
                <td class="manageSPP">Rp 1.750.000</td>
                <td class="manageSPP">
                    <button class="btn-edit manageSPP">Edit</button>
                    <button class="btn-delete manageSPP">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal Form Tambah/Edit SPP -->
<div class="modal fade" id="adminManageSPP-modalForm" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah SPP!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Tahun Ajaran:</label>
                        <input type="text" class="form-control" placeholder="Masukkan Tahun Ajaran">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Semester :</label>
                        <input type="text" class="form-control" placeholder="Masukkan Semester">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nominal:</label>
                        <input type="number" class="form-control" placeholder="Masukkan Nominal SPP">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
