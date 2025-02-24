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
                        <p><strong>Nama</strong> <span>: John Doe</span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Jurusan</strong> <span>: Rekayasa Perangkat Lunak</span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Kelas</strong> <span>: XII RPL</span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>NISN</strong> <span>: 1234567890</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="payment-history">
            <div class="card-title-underline"></div>
            <h3 class="text-center">History Pembayaran Per-Semester</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Semester</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2025</td>
                            <td>Semester 1</td>
                            <td class="status-lunas">Lunas</td>
                        </tr>
                        <tr>
                            <td>2025</td>
                            <td>Semester 2</td>
                            <td class="status-belum">Belum Lunas</td>
                        </tr>
                        <tr>
                            <td>2025</td>
                            <td>Semester 3</td>
                            <td class="status-lunas">Lunas</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


@endsection
