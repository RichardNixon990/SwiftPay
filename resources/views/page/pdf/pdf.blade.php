<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi Pembayaran</title>
</head>
<body>
    <h1 align='center'>Laporan Transaksi Pembayaran</h1>
    <hr>
    <h2>Informasi Transaksi Pembayaran</h2>
    <h3>Nama : {{ $DataSiswa->nama }}</h3>
    <h3>Nama Petugas : {{ $DataPetugas->nama_petugas }}</h3>
    <h4>Tahun : {{ $riwayat->tahun_dibayar }}</h4>
    <h4>Bulan : {{ $riwayat->bulan_dibayar }}</h4>
    <h4>Tanggal : Rp {{ number_format($riwayat->jumlah_bayar, 0, ',', '.') }}</h4>
    <hr>
    <h2>Rincian Pembayaran</h2>
    <h4>Jumlah : {{ $riwayat->jumlah_bayar }}</h4>
    <h4>Metode : {{ $riwayat->metode }}</h4>
</body>
</html>
