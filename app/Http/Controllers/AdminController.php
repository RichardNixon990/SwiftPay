<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Petugas;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $totalSiswa = Siswa::count();
        $totalKelas = Kelas::count();
        $totalPetugas = Petugas::count();
        return view('admin.page.Dashboard.Landing', [
            'totalSiswa' => $totalSiswa,
            'totalKelas' => $totalKelas,
            'totalPetugas' => $totalPetugas,
        ]);
    }

    public function ManageSiswa(){
        return view('admin.page.Dashboard.manageSiswa');
    }
    public function ManageKelas(){
        return view('admin.page.Dashboard.manageClass');
    }
    public function ManagePetugas(){
        return view('admin.page.Dashboard.managePetugas');
    }
    public function ManageSPP(){
        return view('admin.page.Dashboard.manageSPP');
    }
    public function BayarSPP(){
        return view('admin.page.Dashboard.bayarSPP');
    }
}
