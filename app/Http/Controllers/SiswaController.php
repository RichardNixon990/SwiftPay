<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function dashboard() {
        $SppSiswa = Auth::guard('siswa')->user()->spp->nominal;
        $TotalPembayaran = Auth::guard('siswa')->user()->pembayaran->where('id_spp', Auth::guard('siswa')->user()->id_spp)->sum('jumlah_bayar');
        $berlebih = false;
        $sisa = $SppSiswa - $TotalPembayaran;
        if ($sisa < 0) {
            $sisa = abs($sisa);
            $berlebih = true;
        }
        $historiSiswa = Auth::guard('siswa')->user()->pembayaran;
        return view('page.Dasboard.sLanding', [
            'sisa' => $sisa,
            'berlebih' => $berlebih,
            'historiSiswa' => $historiSiswa,
        ]);
    }
}
