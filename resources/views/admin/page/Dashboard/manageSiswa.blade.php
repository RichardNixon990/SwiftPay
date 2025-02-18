@extends('admin.layouts.main')

@section('containerAdmin')
    <div class="manageSiswa-BG">

    </div>
    <div class="adminManageSiswa-container container container-mngSiswa mt-5">
        <h2 class="mb-3 mngSiswa-Header"> - Management Siswa -</h2>
        <blockquote class="bq-mngSiswa">Disini kamu bisa melihat dan memanajemen data-data siswa yang ada di sekolah ini!
        </blockquote>
        <div class="card-title-underline"></div>

        <!-- Tombol Tambah Siswa -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#adminManageSiswa-modalForm">+ Tambah
            Siswa</button>

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
                @foreach ($DataSiswa as $siswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->kelas->nama_kelas }}</td>
                        <td>Rp.1.000.000</td>
                        <td>
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                data-bs-target="#adminManageSiswa-modalDetail-{{ $siswa->id }}">Detail</button>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#adminManageSiswa-modalFormEdit"
                                onclick="editSiswa({{ $siswa->id }}, '{{ $siswa->nama }}', '{{ $siswa->nisn }}', '{{ $siswa->nis }}', '{{ base64_encode($siswa->alamat) }}', {{ $siswa->no_telp }}, {{ $siswa->id_kelas }}, {{ $siswa->id_spp }})
                                ">Edit</button>
                            {{-- <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#adminManageSiswa-modalFormEdit"
                                onclick="editSiswa({{ $siswa->id }}, '{{ $siswa->nama }}', '{{ $siswa->nisn }}', '{{ $siswa->nis }}', '{{ $siswa->alamat }}', '{{ $siswa->password }}', '{{ $siswa->no_telp }}', {{ $siswa->kelas->id }}, {{ $siswa->spp->id }})">Edit</button> --}}
                            <a href="{{ route('admin.hapusSiswa', $siswa->id) }}"
                                onclick="return confirm('Apakah kamu yakin ingin menghapus Siswa ini?');">
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $DataSiswa->links('pagination::bootstrap-5') }}
    </div>

    @foreach ($DataSiswa as $siswa)
        <div class="modal fade" id="adminManageSiswa-modalDetail-{{ $siswa->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-white">
                        <h5 class="modal-title">Detail Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Nama :</strong> {{ $siswa->nama }}</p>
                        <p><strong>Kelas :</strong> {{ $siswa->kelas->nama_kelas }}</p>
                        <p><strong>Alamat :</strong> {{ $siswa->alamat }}</p>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">View Profile</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Form Tambah/Edit -->
    <div class="modal fade" id="adminManageSiswa-modalForm" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.tambahSiswa') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label name">Nama :</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label name">NISN :</label>
                            <input type="number" class="form-control" placeholder="Masukkan NISN" name="nisn">
                        </div>
                        <div class="mb-3">
                            <label class="form-label name">NIS :</label>
                            <input type="number" class="form-control" placeholder="Masukkan NIS" name="nis">
                        </div>
                        <div class="mb-3">
                            <label class="form-label name">Alamat :</label>
                            <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat">
                        </div>
                        <div class="mb-3">
                            <label class="form-label name">Password :</label>
                            <input type="text" class="form-control" placeholder="Masukkan Password Untuk Siswa"
                                name="password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label name">No Telp :</label>
                            <input type="number" class="form-control" placeholder="Masukkan No Telp" name="no_telp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label class">Kelas :</label>
                            <select class="form-select" name="id_kelas">
                                <option selected disabled>Pilih Kelas</option>
                                @foreach ($DataKelas as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label class">SPP :</label>
                            <select class="form-select" name="id_spp">
                                <option selected disabled>Pilih SPP</option>
                                @foreach ($DataSpp as $spp)
                                    <option value="{{ $spp->id }}">{{ $spp->tahun }}-{{ $spp->nominal }}</option>
                                @endforeach
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
    <div class="modal fade" id="adminManageSiswa-modalFormEdit" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.updateSiswa') }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" id="editid" name="id_siswa">
                        <div class="mb-3">
                            <label class="form-label name">Nama :</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama" id="edit-nama"
                                name="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label name">NISN :</label>
                            <input type="number" class="form-control" placeholder="Masukkan NISN" id="edit-nisn"
                                name="nisn">
                        </div>
                        <div class="mb-3">
                            <label class="form-label name">NIS :</label>
                            <input type="number" class="form-control" placeholder="Masukkan NIS" id="edit-nis"
                                name="nis">
                        </div>
                        <div class="mb-3">
                            <label class="form-label name">Alamat :</label>
                            <input type="text" class="form-control" placeholder="Masukkan Alamat" id="edit-alamat"
                                name="alamat">
                        </div>
                        <div class="mb-3">
                            <label class="form-label name">Password :</label>
                            <input type="text" class="form-control" placeholder="Update Password, Jika tidak kosongkan"
                                id="edit-password" name="password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label name">No Telp :</label>
                            <input type="number" class="form-control" placeholder="Masukkan No Telp" id="edit-no_telp"
                                name="no_telp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label class">Kelas :</label>
                            <select class="form-select" id="edit-kelas" name="id_kelas">
                                <option selected disabled>Pilih Kelas</option>
                                @foreach ($DataKelas as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label class">SPP :</label>
                            <select class="form-select" id="edit-spp" name="id_spp">
                                <option selected disabled>Pilih SPP</option>
                                @foreach ($DataSpp as $spp)
                                    <option value="{{ $spp->id }}">{{ $spp->tahun }}-{{ $spp->nominal }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function tes() {
            console.log('tes klik')
        }

        function editSiswa(id, nama, nisn, nis, alamat, no_telp, kelas, spp) {
            alamat = atob(alamat);
            console.log('fungsi masuk')
            console.log([id, nama, nisn, nis, alamat, no_telp, kelas, spp]);

            // Mengisi form dengan data yang diterima
            document.getElementById("editid").value = id;
            document.getElementById("edit-nama").value = nama;
            document.getElementById("edit-nisn").value = nisn;
            document.getElementById("edit-nis").value = nis;
            document.getElementById("edit-alamat").value = alamat;
            document.getElementById("edit-no_telp").value = no_telp;
            document.getElementById("edit-kelas").value = kelas; // Misalnya: kelas ID
            document.getElementById("edit-spp").value = spp; // Misalnya: spp ID
        }
    </script>
@endsection
