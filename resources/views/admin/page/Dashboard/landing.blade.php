
@extends('admin.layouts.main')

@section('containerAdmin')

<div class="adminLanding-BG">

</div>

    <div class="container container-adminLan mt-4">
        <div class="row g-4">

            <div class="container-fluid d-flex adminName">
                <div class="heading-text">
                    <h1>Halo Admin, (Nama Admin)</h1>
                    <blockquote class="adminLanding">Disini kamu bisa mengatur dan melihat semua aktivitas! Gunakan Akses Privilege Ini Dengan Sebaiknya!</blockquote>
                </div>
            </div>
            <!-- Ringkasan Data -->
            <div class="col-3">
                <div class="card adminlanding-card">
                    <div class="card-body">
                        <h5 class="adminlanding-card-title">Total SPP Belum Dibayar</h5>
                        <div class="card-title-underline"></div>
                        <p class="adminlanding-card-amount">Rp 10.000.000</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card adminlanding-card">
                    <div class="card-body">
                        <h5 class="adminlanding-card-title">Total Siswa</h5>
                        <div class="card-title-underline"></div>
                        <p class="adminlanding-card-amount">500</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card adminlanding-card">
                    <div class="card-body">
                        <h5 class="adminlanding-card-title">Total Kelas</h5>
                        <div class="card-title-underline"></div>
                        <p class="adminlanding-card-amount">20</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card adminlanding-card">
                    <div class="card-body">
                        <h5 class="adminlanding-card-title">Total Petugas</h5>
                        <div class="card-title-underline"></div>
                        <p class="adminlanding-card-amount">5</p>
                    </div>
                </div>
            </div>

            <!-- Statistik Pembayaran -->
            <div class="col-12">
                <div class="card adminlanding-card">
                    <div class="card-body">
                        <h5 class="adminlanding-card-title">Statistik Pembayaran Bulan Ini</h5>
                        <div class="card-title-underline"></div>
                        <p class="adminlanding-card-info">Rp 30.000.000 sudah masuk</p>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 75%;">75% Lunas</div>
                            <div class="progress-bar bg-danger" style="width: 25%;">25% Belum</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Histori Pembayaran Terbaru -->
            <div class="col-12">
                <div class="card adminlanding-card">
                    <div class="card-body">
                        <h5 class="adminlanding-card-title">Histori Pembayaran Terbaru</h5>
                        <div class="card-title-underline"></div>
                        <table class="table table-striped adminlanding-table">
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Rizky Putra</td>
                                    <td>10-02-2025</td>
                                    <td>Rp 1.500.000</td>
                                    <td><span class="badge bg-success">Lunas</span></td>
                                </tr>
                                <tr>
                                    <td>Siti Aminah</td>
                                    <td>09-02-2025</td>
                                    <td>Rp 1.500.000</td>
                                    <td><span class="badge bg-success">Lunas</span></td>
                                </tr>
                                <tr>
                                    <td>Ahmad Fauzan</td>
                                    <td>-</td>
                                    <td>Rp 1.500.000</td>
                                    <td><span class="badge bg-danger">Belum Bayar</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Notifikasi & Reminder -->
            <div class="col-12">
                <div class="card adminlanding-card">
                    <div class="card-body">
                        <h5 class="adminlanding-card-title">Tagihan SPP Tertunggak</h5>
                        <div class="card-title-underline"></div>
                        <p class="adminlanding-card-warning">Ada 10 siswa yang belum membayar SPP bulan ini.</p>
                        <button class="btn btn-warning">Lihat Detail</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

