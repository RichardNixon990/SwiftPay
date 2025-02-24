@extends('layouts.main')

@section('containerDashboard')
    <div class="profileBG">

    </div>
    <div class="container mt-4">
        <div class="container profile-container">
            <div class="profile-header">
                <img src="{{ asset('Assets/Image/Swift.png') }}" alt="Profile Photo" class="profile-photo">
                <div class="profile-info">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Nama</strong> <span>:
                                    {{ !$admin ? (Auth::guard('siswa')->check() ? Auth::guard('siswa')->user()->nama : '') : $siswa->nama }}</span>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Wali Kelas</strong> <span>:
                                    {{ Auth::guard('siswa')->check() ? Auth::guard('siswa')->user()->kelas->wali_kelas : $siswa->kelas->wali_kelas }}</span>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Kelas</strong> <span>:
                                    {{ Auth::guard('siswa')->check() ? Auth::guard('siswa')->user()->kelas->nama_kelas : $siswa->kelas->nama_kelas }}</span>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>NISN</strong> <span>:
                                    {{ Auth::guard('siswa')->check() ? Auth::guard('siswa')->user()->nisn : $siswa->nisn }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="payment-history">
                <div class="card-title-underline"></div>
                <h3 class="text-center">History Pembayaran Per-Semester</h3>
                <div class="table-responsive">
                    @if ($data->isEmpty())
                        <h3 align = "center"><i>Tidak ada data</i></h3>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tahun</th>
                                    <th>Semester</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $d->tahun_dibayar }}</td>
                                        <td>{{ $d->semester }}</td>
                                        @if ($d->sisa_pembayaran <= 0)
                                            <td class="status-lunas">Lunas</td>
                                        @else
                                            <td class="status-belum">Belum</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
