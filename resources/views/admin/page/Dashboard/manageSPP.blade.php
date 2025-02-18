@extends('admin.layouts.main')

@section('containerAdmin')
    <div class="manageSPP-BG manageSPP">

    </div>
    <div class="container manageSPP mt-5">
        <h2 class="manageSPP mngSPP-Header">Manajemen SPP</h2>
        <blockquote class="bq-mngSPP">Di sini kamu bisa melihat dan memanajemen data pembayaran SPP di sekolah ini!
        </blockquote>
        <div class="card-title-underline"></div>
        <button class="btn btn-primary btn-add mb-3 manageSPP" data-bs-toggle="modal"
            data-bs-target="#adminManageSPP-modalForm">
            + Tambah SPP
        </button>
        <table class="table manageSPP">
            <thead>
                <tr>
                    <th class="manageSPP">No</th>
                    <th class="manageSPP">Tahun Ajaran</th>
                    <th class="manageSPP">Semester</th>
                    <th class="manageSPP">Nominal</th>
                    <th class="manageSPP">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($DataSpp as $spp)
                    <tr class="manageSPP">
                        <td class="manageSPP">{{ $loop->iteration }}</td>
                        <td class="manageSPP">{{ $spp->tahun }}</td>
                        <td class="manageSPP">{{ $spp->semester }}</td>
                        <td class="manageSPP">Rp.{{ $spp->nominal }}</td>
                        <td class="manageSPP">
                            <button class="btn-edit manageSPP" data-bs-toggle="modal"
                                data-bs-target="#EditadminManageSPP-modalForm"
                                onclick="editSpp({{ $spp->id }}, {{ $spp->tahun }}, '{{ $spp->semester }}', {{ $spp->nominal }})">
                                Edit
                            </button>

                            <a href="{{ route('admin.hapusSpp', $spp->id) }}"
                                onclick="return confirm('Apakah kamu yakin ingin menghapus Spp ini?');">
                                <button class="btn-delete manageSPP">Hapus</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $DataSpp->links('pagination::bootstrap-5') }}
    </div>

    <!-- Modal Form Tambah SPP -->
    <div class="modal fade" id="adminManageSPP-modalForm" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah SPP!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.tambahSpp') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Tahun Ajaran:</label>
                            <input type="text" class="form-control" placeholder="Masukkan Tahun Ajaran" name="tahun">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Semester :</label>
                            <input type="text" class="form-control" placeholder="Masukkan Semester" name="semester">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nominal:</label>
                            <input type="number" class="form-control" placeholder="Masukkan Nominal SPP" name="nominal">
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Form Edit SPP -->
    <div class="modal fade" id="EditadminManageSPP-modalForm" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit SPP!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.updateSpp') }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" id="editid" name="editid">
                        <div class="mb-3">
                            <label class="form-label">Tahun Ajaran:</label>
                            <input type="text" class="form-control" placeholder="Masukkan Tahun Ajaran" name="tahun"
                                id="edit-tahun">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Semester :</label>
                            <input type="text" class="form-control" placeholder="Masukkan Semester" name="semester"
                                id="edit-semester">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nominal:</label>
                            <input type="number" class="form-control" placeholder="Masukkan Nominal SPP" name="nominal"
                                id="edit-nominal">
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function editSpp(id, tahun, semester, nominal) {
            console.log('fungsi masuk')
            console.log([id, tahun, semester, nominal]);
            document.getElementById("editid").value = id;
            document.getElementById("edit-tahun").value = tahun;
            document.getElementById("edit-semester").value = semester;
            document.getElementById("edit-nominal").value = nominal;
        }
    </script>
@endsection
