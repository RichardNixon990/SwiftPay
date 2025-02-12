@extends('layouts.main')

@section('containerDashboard')

    <div class="slanding-bg">

    </div>
    <div class="container mt-4">
        <div class="row g-4">
            <!-- Total SPP yang harus dibayar -->
            <div class="col-md-6">
                <div class="card slsiswa-card">
                    <div class="card-body">
                        <h5 class="slsiswa-card-title">Total SPP yang Harus Dibayar</h5>
                        <p class="slsiswa-card-amount">Rp 1.500.000</p>
                    </div>
                </div>
            </div>

            <!-- Status Pembayaran Terakhir -->
            <div class="col-md-6">
                <div class="card slsiswa-card">
                    <div class="card-body">
                        <h5 class="slsiswa-card-title">Status Pembayaran Terakhir</h5>
                        <p class="slsiswa-card-status">Lunas - Januari 2025</p>
                    </div>
                </div>
            </div>

            <!-- Tagihan yang Akan Datang -->
            <div class="col-12">
                <div class="card slsiswa-card">
                    <div class="card-body">
                        <h5 class="slsiswa-card-title">Tagihan yang Akan Datang</h5>
                        <p class="slsiswa-card-tagihan">Februari 2025 - Rp 1.500.000 (Belum Dibayar)</p>
                    </div>
                </div>
            </div>

            <!-- Histori Pembayaran -->
            <div class="col-12">
                <div class="card slsiswa-card">
                    <div class="card-body">
                        <h5 class="slsiswa-card-title">Histori Pembayaran</h5>
                        <table class="table table-striped slsiswa-table">
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
