<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Spp;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalSiswa = Siswa::count();
        $totalKelas = Kelas::count();
        $totalPetugas = Petugas::count();
        $totalUangMasuk = Pembayaran::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->sum('jumlah_bayar');
        $HistoriTerbaru = Pembayaran::with('siswa')->latest()->take(3)->get();


        $totalBelumDibayar = Siswa::leftJoin('spps', 'siswas.id_spp', '=', 'spps.id')
            ->leftJoin('pembayarans', function ($join) {
                $join->on('siswas.nisn', '=', 'pembayarans.nisn')
                    ->on('siswas.id_spp', '=', 'pembayarans.id_spp');
            })
            ->selectRaw('SUM(spps.nominal) - SUM(IFNULL(pembayarans.jumlah_bayar, 0)) as total_belum_dibayar')
            ->value('total_belum_dibayar');


        return view('admin.page.Dashboard.Landing', [
            'totalSiswa' => $totalSiswa,
            'totalKelas' => $totalKelas,
            'totalPetugas' => $totalPetugas,
            'totalUangMasuk' => $totalUangMasuk,
            'HistoriTerbaru' => $HistoriTerbaru,
            'totalBelumDibayar' => $totalBelumDibayar,
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

    //? AREA MANAGE PETUGAS
    public function ManagePetugas()
    {
        return view('admin.page.Dashboard.managePetugas', [
            'petugas' => Petugas::orderBy('created_at', 'desc')->paginate(5)
        ]);
    }

    public function tambahPetugas(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nama_petugas' => 'required',
            'level' => 'required|in:admin,petugas',
        ]);

        $petugas = new Petugas();
        $petugas->username = $request->username;
        $petugas->password = Hash::make($request->password);
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->level = $request->level;
        $petugas->save();

        return back()->with('success', 'Berhasil Membuat Data Petugas Baru');
    }

    public function hapusPetugas(Petugas $petugas)
    {
        $petugas->delete();
        return back();
    }
    public function updatePetugas(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'nullable',
            'nama_petugas' => 'required',
            'level' => 'required|in:admin,petugas',
        ]);
        $petugas = Petugas::findOrFail($request->editid);
        $petugas->username = $request->username;
        $petugas->password = Hash::make($request->password);
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->level = $request->level;
        $petugas->save();
        return back();
    }
    //? AREA MANAGE PETUGAS END

    public function BayarSPP(Request $request)
    {
        $DataSiswa = Siswa::orderBy('nama', 'asc')->get();
        if ($request->search != null) {
            $DataSiswa = Siswa::where('nama', 'like', '%' . $request->search . '%')->get();
        }
        $DataKelas = Kelas::orderBy('nama_kelas', 'asc')->get();
        $DataSpp = Spp::orderBy('created_at', 'desc')->get();
        $DataRiwayat = Pembayaran::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.page.Dashboard.bayarSPP', [
            'DataSiswa' => $DataSiswa,
            'DataKelas' => $DataKelas,
            'DataSpp' => $DataSpp,
            'DataRiwarat' => $DataRiwayat
        ]);
    }

    public function StoreSPP(Request $request)
    {
        $request->validate([
            'siswa' => 'required',
            'tahun' => 'required',
            'bulan' => 'required',
            'metode' => 'required',
            'jumlah' => 'required',
        ]);
        $nisn = $request->siswa;
        $pembayaran = new Pembayaran();
        $pembayaran->id_petugas = Auth::guard('petugas')->user()->id;
        $pembayaran->nisn = $nisn;
        $pembayaran->tgl_bayar = Carbon::today();
        $pembayaran->bulan_dibayar = $request->bulan;
        $pembayaran->tahun_dibayar = $request->tahun;
        $pembayaran->id_spp = Siswa::where('nisn', $nisn)->value('id_spp');
        $pembayaran->metode = $request->metode;
        $pembayaran->jumlah_bayar = $request->jumlah;
        $pembayaran->save();
        return back();
    }

    public function GenerateLaporan(Pembayaran $riwayat)
    {
        $nisn = $riwayat->nisn;
        $DataPetugas = Petugas::find($riwayat->id_petugas);
        $DataSiswa = Siswa::where('nisn', $nisn)->first();
        $pdf = Pdf::loadView('page.pdf.pdf', [
            'nisn' => $nisn,
            'riwayat' => $riwayat,
            'DataSiswa' => $DataSiswa,
            'DataPetugas' => $DataPetugas,
        ]);
        return $pdf->download('invoice_' . $nisn . '_'.$DataSiswa->nama.'_' . $riwayat->created_at . '.pdf');
    }
}
