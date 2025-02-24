@extends('layouts.main')

@section('containerDashboard')
    <div class="slanding-bg">

    </div>
    <div class="container mt-4">

        <div class="container-fluid mx-6" style="margin-top: 70px;">
            <div class="header header-text-dashboard text-center p-5">
                <h1 class="welcome-dashboard">
                    Selamat Datang <span>{{ Auth::guard('siswa')->user()->nama }}</span> di <span>SwiftPay</span>
                </h1>
                <p class="welcomeP-dashboard">
                    Pantau dan kelola pembayaran SPP Anda dengan mudah dan cepat!
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Total SPP yang harus dibayar -->
            <div class="col-6">
                <div class="card slsiswa-card card-table">
                    <div class="card-body">
                        <h5 class="slsiswa-card-title spp-title"> <i> Total SPP yang Harus Dibayar </i></h5>
                        <p class="slsiswa-card-amount" style="margin-top: 3vh">Rp
                            {{ number_format(Auth::guard('siswa')->user()->spp->nominal, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            {{-- <!-- Status Pembayaran Terakhir -->
            <div class="col-6">
                <div class="card slsiswa-card card-table">
                    <div class="card-body">
                        <h5 class="slsiswa-card-title"> <i>Status Pembayaran Terakhir</i></h5>
                        <p class="slsiswa-card-status" style="margin-top: 3vh">Lunas - Januari 2025</p>
                    </div>
                </div>
            </div>

            <!-- Tagihan yang Akan Datang -->
            <div class="col-6">
                <div class="card slsiswa-card card-table">
                    <div class="card-body">
                        <h5 class="slsiswa-card-title"><i>Tagihan yang Akan Datang</i></h5>
                        <p class="slsiswa-card-tagihan" style="margin-top: 3vh">Februari 2025 - Rp 1.500.000 (Belum Dibayar)</p>
                    </div>
                </div>
            </div> --}}

            <!-- Tagihan yang Akan Datang -->
            <div class="col-6">
                <div class="card slsiswa-card card-table">
                    <div class="card-body">
                        <h5 class="slsiswa-card-title"><i>Tagihan Sisa </i></h5>
                        <p class="slsiswa-card-amount" style="margin-top: 3vh">{{ $berlebih ? '+' : '' }}Rp
                            {{ number_format($sisa, 0, ',', '.') }}</p>
                        <i
                            class="">{{ $berlebih ? 'Anda memiliki pembayaran berlebih, silahkan ajukan ke administator untuk mengembalikan dana' : '' }}</i>
                    </div>
                </div>
            </div>

            <!-- Histori Pembayaran -->
            <div class="col-12">
                <div class="card slsiswa-card rounded-border">
                    <div class="card-body body-table">
                        <h5 class="slsiswa-card-title "><i>Histori Pembayaran</i></h5>
                        <table class="table table-striped slsiswa-table" style="margin-top: 3vh">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>SPP</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($historiSiswa as $histori)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $histori->spp->tahun }}/{{ $histori->spp->semester }} : ({{ $histori->spp->nominal }})</td>
                                        <td>{{ $histori->tgl_bayar }}</td>
                                        <td>Rp {{ number_format($histori->jumlah_bayar, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $historiSiswa->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
