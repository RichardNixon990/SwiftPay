@extends('admin.layouts.main')

@section('containerAdmin')
    <div class="bayarSPP-BG">

    </div>
    <div class="container container-byrSPP shadow px-5 py-5 mt-5">
        <div class="position-relative text-center mb-3">
            <h2 class="mb-0 byrSPP-Header">- Pembayaran SPP -</h2>
            <form action="">
                <input type="text" name="search" id="search"
                    class="input form-control search-form position-absolute end-0 top-50 translate-middle-y w-25"
                    placeholder="Cari siswa...">
            </form>
        </div>

        <div class="card-title-underline"></div>
        <!-- Form Pilih Siswa dan Tahun -->
        <form action="{{ route('admin.StoreSPP') }}" class="form" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="siswa" class="input-label form-label px-1">Pilih Siswa</label>
                    <select id="siswa" name="siswa" class="form-select input">
                        <option selected disabled>-- Pilih Siswa --</option>
                        @foreach ($DataSiswa as $siswa)
                            <option value="{{ $siswa->nisn }}">{{ $siswa->nama }} </option>
                        @endforeach
                    </select>

                </div>
                <div class="col-md-6">
                    <label for="tahun" class="input-label form-label px-1">Tahun</label>
                    <input type="number" name="tahun" id="tahun" class="form-control input"
                        placeholder="Masukan Tahun">
                </div>

            </div>

            <!-- Form Nominal dan Metode Pembayaran -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nominal" class="input-label form-label px-1">Nominal</label>
                    <input type="text" name="jumlah" id="nominal" class="form-control input"
                        placeholder="Rp1.750.000">
                </div>
                <div class="col-md-6">
                    <label for="bulan" class="input-label form-label px-1">Bulan</label>
                    <select id="bulan" class="form-select input" name="bulan">
                        <option value="januari">Januari</option>
                        <option value="februari">Februari</option>
                        <option value="maret">Maret</option>
                        <option value="april">April</option>
                        <option value="mei">Mei</option>
                        <option value="juni">Juni</option>
                        <option value="juli">Juli</option>
                        <option value="agustus">Agustus</option>
                        <option value="september">September</option>
                        <option value="oktober">Oktober</option>
                        <option value="november">November</option>
                        <option value="desember">Desember</option>
                    </select>
                </div>
                {{-- <div class="col-md-6">
                <form action="" class="form">
                    <label for="metode" class="input-label form-label px-1">Metode Pembayaran</label>
                    <select id="metode" class="form-select input">
                        <option value="cash">Tunai</option>
                        <option value="transfer">Transfer Bank</option>
                        <option value="ewallet">E-Wallet</option>
                    </select>
                </form>
            </div> --}}
            </div>

            <!-- Form Pilih SPP -->
            <div class="mb-3">
                <label for="metode" class="input-label form-label px-1">Pilih SPP</label>
                <select id="metode" class="form-select input" name="metode">
                    <option selected disabled>Metode Pembayaran</option>
                    <option value="tunai">Tunai</option>
                    <option value="transfer">Transfer Bank</option>
                    <option value="e-wallet">E-Wallet</option>
                </select>
            </div>
            {{-- <div class="mb-3">
                <label for="metode" class="input-label form-label px-1">Pilih SPP</label>
                <select id="metode" class="form-select input" name="spp">
                    <option selected disabled>Pilih SPP</option>
                    @foreach ($DataSpp as $spp)
                        <option value="{{ $spp->id }}">{{ $spp->tahun }}-{{ $spp->semester }}-{{ $spp->nominal }}
                        </option>
                    @endforeach
                </select>
            </div> --}}

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-warning w-50 login-button">Bayar Sekarang</button>
            </div>
        </form>

        <!-- Riwayat Pembayaran -->
        <div class="container container-pembayaran mt-5">
            <h3 class="text-center">Riwayat Pembayaran</h3>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Tahun Dibayar</th>
                            <th>Bulan Dibayar</th>
                            <th>Nominal</th>
                            <th>Metode</th>
                            <th>Tanggal Pembayaran</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($DataRiwarat as $riwayat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $riwayat->tahun_dibayar }}</td>
                                <td>{{ $riwayat->bulan_dibayar }}</td>
                                <td>{{ $riwayat->jumlah_bayar }}</td>
                                <td>{{ $riwayat->metode }}</td>
                                <td>{{ $riwayat->tgl_bayar }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $DataRiwarat->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
