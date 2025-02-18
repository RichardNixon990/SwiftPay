<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalSiswa = Siswa::count();
        $totalKelas = Kelas::count();
        $totalPetugas = Petugas::count();
        return view('admin.page.Dashboard.Landing', [
            'totalSiswa' => $totalSiswa,
            'totalKelas' => $totalKelas,
            'totalPetugas' => $totalPetugas,
        ]);
    }

    // ? AREA MANAGE SISWA
    public function ManageSiswa()
    {
        // $siswa = Siswa::all();
        // foreach ($siswa as $s) {
        //     $sppId = $s->spp->id;
        // }
        return view('admin.page.Dashboard.manageSiswa', [
            'DataSiswa' => Siswa::orderBy('nama', 'asc')->paginate(5),
            'DataKelas' => Kelas::orderBy('nama_kelas', 'asc')->get(),
            'DataSpp' => Spp::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function tambahSiswa(Request $request)
    {
        $request->validate([
            'nama' => ['required'],
            'nisn' => ['required'],
            'nis' => ['required'],
            'alamat' => ['required'],
            'password' => ['required', 'min:8'],
            'no_telp' => ['required'],
            'id_kelas' => ['required'],
            'id_spp' => ['required'],
        ]);
        $siswa = new Siswa();
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = $request->no_telp;
        $siswa->id_spp = $request->id_spp;
        $siswa->password = Hash::make($request->password);
        $siswa->save();
        return back();
    }
    public function hapusSiswa(Siswa $siswa)
    {
        $siswa->delete();
        return back();
    }
    public function updateSiswa(Request $request)
    {
        $request->validate([
            'nama' => ['required'],
            'nisn' => ['required'],
            'nis' => ['required'],
            'alamat' => ['required'],
            'password' => ['nullable', 'min:8'],
            'no_telp' => ['required'],
            'id_kelas' => ['required'],
            'id_spp' => ['required'],
        ]);
        $siswa = Siswa::findOrFail($request->id_siswa);
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = $request->no_telp;
        $siswa->id_spp = $request->id_spp;
        $siswa->password = Hash::make($request->password);
        $siswa->save();
        return back();
    }

    // ? AREA MANAGE SISWA END


    //? AREA MANAGE KELAS
    public function ManageKelas()
    {
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->paginate(5);
        return view('admin.page.Dashboard.manageClass', [
            'kelas' => $kelas
        ]);
    }
    public function tambahKelas(Request $request)
    {
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
    public function hapusKelas(Kelas $kelas)
    {
        $kelas->delete();
        return back();
    }
    public function updateKelas(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'wali_kelas' => 'required',
        ]);
        $kelasEdit = Kelas::findOrFail($request->id_kelas);
        $kelasEdit->nama_kelas = $request->nama_kelas;
        $kelasEdit->wali_kelas = $request->wali_kelas;
        $kelasEdit->save();
        return back();
    }
    //? AREA MANAGE KELAS END

    //? AREA MANAGE SPP
    public function ManageSPP()
    {
        return view('admin.page.Dashboard.manageSPP', [
            'DataSpp' => Spp::orderBy('created_at', 'desc')->paginate(5)
        ]);
    }
    public function tambahSpp(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'semester' => 'required|in:ganjil,genap',
            'nominal' => 'required|numeric',
        ]);
        $spp = new Spp();
        $spp->tahun = $request->tahun;
        $spp->semester = $request->semester;
        $spp->nominal = $request->nominal;
        $spp->save();
        return back()->with('success', 'Data SPP Berhasil Ditambahkan');
    }

    public function hapusSpp(Spp $spp)
    {
        $spp->delete();
        return back();
    }
    public function updateSpp(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'semester' => 'required|in:ganjil,genap',
            'nominal' => 'required|numeric',
        ]);
        $SppEdit = Spp::findOrFail($request->editid);
        $SppEdit->tahun = $request->tahun;
        $SppEdit->semester = $request->semester;
        $SppEdit->nominal = $request->nominal;
        $SppEdit->save();
        return back();
    }
    //? AREA MANAGE SPP END
    public function ManagePetugas()
    {
        return view('admin.page.Dashboard.managePetugas');
    }

    public function BayarSPP()
    {
        return view('admin.page.Dashboard.bayarSPP');
    }
}
