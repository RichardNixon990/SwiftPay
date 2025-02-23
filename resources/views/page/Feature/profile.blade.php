@extends('layouts.main')

@section('containerDashboard')


<div class="login-bg"></div>
<div class="container mt-4">
    <div class="profile-container">
        <div class="profile-header">
            <img src="{{ asset('Assets/Image/Swift.png') }}" alt="Profile Photo" class="profile-photo">
            <div class="profile-info">
                <p><strong>Nama:</strong> John Doe</p>
                <p><strong>Kelas:</strong> XII RPL</p>
                <p><strong>Jurusan:</strong> Rekayasa Perangkat Lunak</p>
                <p><strong>INSN:</strong> 1234567890</p>
            </div>
        </div>
        <div class="payment-history">
            <h3 class="text-center">History Pembayaran Per-Semester</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Semester</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Semester 1</td>
                            <td class="status-lunas">Lunas</td>
                        </tr>
                        <tr>
                            <td>Semester 2</td>
                            <td class="status-belum">Belum Lunas</td>
                        </tr>
                        <tr>
                            <td>Semester 3</td>
                            <td class="status-nunggak">Nunggak</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
