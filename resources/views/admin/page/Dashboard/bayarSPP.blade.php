@extends('admin.layouts.main')

@section('containerAdmin')

<div class="bayarSPP-BG">

</div>
    <div class="container container-byrSPP shadow px-5 py-5 mt-5">
        <div class="position-relative text-center mb-3">
            <h2 class="mb-0 byrSPP-Header">- Pembayaran SPP -</h2>
            <input type="text" class="input form-control search-form position-absolute end-0 top-50 translate-middle-y w-25" placeholder="Cari siswa...">
        </div>

        <div class="card-title-underline"></div>
       <!-- Form Pilih Siswa dan Tahun -->
<div class="row mb-3">
    <div class="col-md-6">
        <form action="" class="form">
            <label for="siswa" class="input-label form-label px-1">Pilih Siswa</label>
            <select id="siswa" class="form-select input">
                <option value="">-- Pilih Siswa --</option>
                <option value="1">Ahmad Rizki</option>
                <option value="2">Dina Sari</option>
            </select>
        </form>
    </div>
    <div class="col-md-6">
        <form action="" class="form">
            <label for="tahun" class="input-label form-label px-1">Tahun</label>
            <select id="tahun" class="form-select input">
                <option value="2024">2024</option>
                <option value="2023">2023</option>
            </select>
        </form>
    </div>
</div>

<!-- Form Nominal dan Metode Pembayaran -->
<div class="row mb-3">
    <div class="col-md-6">
        <form action="" class="form">
            <label for="nominal" class="input-label form-label px-1">Nominal</label>
            <input type="text" id="nominal" class="form-control input" placeholder="Rp1.750.000">
        </form>
    </div>
    <div class="col-md-6">
        <form action="" class="form">
            <label for="metode" class="input-label form-label px-1">Metode Pembayaran</label>
            <select id="metode" class="form-select input">
                <option value="cash">Tunai</option>
                <option value="transfer">Transfer Bank</option>
                <option value="ewallet">E-Wallet</option>
            </select>
        </form>
    </div>
</div>

<!-- Form Pilih SPP -->
<div class="mb-3">
    <form action="" class="form">
        <label for="metode" class="input-label form-label px-1">Pilih SPP</label>
        <select id="metode" class="form-select input">
            <option value="select">1</option>
            <option value="select">1</option>
            <option value="select">1</option>
        </select>
    </form>
</div>

        <div class="d-flex justify-content-center">
            <button class="btn btn-warning w-50 login-button">Bayar Sekarang</button>
        </div>

         <!-- Riwayat Pembayaran -->
         <div class="container container-pembayaran mt-5">
            <h3 class="text-center">Riwayat Pembayaran</h3>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Nominal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2023</td>
                            <td>Rp1.500.000</td>
                            <td><span class="text-success fw-bold">Lunas</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2024</td>
                            <td>Rp1.750.000</td>
                            <td><span class="text-danger fw-bold">Belum Bayar</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
         </div>
    </div>
@endsection

