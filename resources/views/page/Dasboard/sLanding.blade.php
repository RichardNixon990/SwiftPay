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
                        <p class="slsiswa-card-amount" style="margin-top: 3vh">Rp {{ number_format(Auth::guard('siswa')->user()->spp->nominal, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Status Pembayaran Terakhir -->
            <div class="col-6">
                <div class="card slsiswa-card card-table"">
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
            </div>

            <!-- Tagihan yang Akan Datang -->
            <div class="col-6">
                <div class="card slsiswa-card card-table">
                    <div class="card-body">
                        <h5 class="slsiswa-card-title"><i>Tagihan Sisa </i></h5>
                        <p class="slsiswa-card-tagihan" style="margin-top: 3vh">Februari 2025 - Rp 500.000 ( Sisa )</p>
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
                                    <th>Bulan</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Januari 2025</td>
                                    <td>05-01-2025</td>
                                    <td>Rp 1.500.000</td>
                                    <td><span class="badge bg-success">Lunas</span></td>
                                </tr>
                                <tr>
                                    <td>Desember 2024</td>
                                    <td>10-12-2024</td>
                                    <td>Rp 1.500.000</td>
                                    <td><span class="badge bg-success">Lunas</span></td>
                                </tr>
                                <tr>
                                    <td>November 2024</td>
                                    <td>-</td>
                                    <td>Rp 1.500.000</td>
                                    <td><span class="badge bg-danger">Belum Dibayar</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
