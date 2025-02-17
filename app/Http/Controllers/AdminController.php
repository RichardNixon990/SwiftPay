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

    //? AREA MANAGE KELAS
    public function ManageKelas(){
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->paginate(5);
        return view('admin.page.Dashboard.manageClass',[
            'kelas' => $kelas
        ]);
    }
    public function tambahKelas(Request $request){
        $request->validate([
            'nama_kelas' => 'required',
            'wali_kelas' => 'required',
        ]);
        $kelas = new Kelas();
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->wali_kelas = $request->wali_kelas;
        $kelas->save();
        return back();
    }
    public function hapusKelas(Kelas $kelas) {
        $kelas->delete();
        return back();
    }
    //? AREA MANAGE KELAS END
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
