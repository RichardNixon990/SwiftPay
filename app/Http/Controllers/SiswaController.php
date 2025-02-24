<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $SppSiswa = Auth::guard('siswa')->user()->spp->nominal;
        $TotalPembayaran = Auth::guard('siswa')->user()->pembayaran->where('id_spp', Auth::guard('siswa')->user()->id_spp)->sum('jumlah_bayar');
        $berlebih = false;
        $sisa = $SppSiswa - $TotalPembayaran;
        if ($sisa <= 0) {
            $sisa = abs($sisa);
            $berlebih = true;
        }
        $historiSiswa = Auth::guard('siswa')->user()->pembayaran()->paginate(5);
        return view('page.Dasboard.sLanding', [
            'sisa' => $sisa,
            'berlebih' => $berlebih,
            'historiSiswa' => $historiSiswa,
        ]);
    }

    public function profileSiswa()
    {
        $nisn = Auth::guard('siswa')->user()->nisn;
        $admin = false;
        $data = DB::table('pembayarans as p')
            ->leftJoin('spps as s', 'p.id_spp', '=', 's.id')
            ->select(
                'p.nisn',
                'p.tahun_dibayar',
                'p.id_spp',
                's.semester',
                DB::raw('SUM(p.jumlah_bayar) as total_bayar'),
                's.nominal as nominal_spp',
                DB::raw('(s.nominal - SUM(p.jumlah_bayar)) as sisa_pembayaran')
            )
            ->where('p.nisn', $nisn)
            ->groupBy('p.nisn', 'p.tahun_dibayar', 'p.id_spp', 's.nominal')
            ->get();

        //return $data;
        return view('page.Feature.profile', [
            'data' => $data,
            'admin' => $admin,
        ]);
    }
}
