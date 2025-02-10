<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiswaAuth extends Controller
{
    // FUNGSI KE HALAMAN LOGIN
    public function loginSiswa() {
        return view('page.Login_Register.Login'); // ini name viewnya
    }

    // FUNGSI LOGIN

    public function signinSiswa(Request $request) {
        $credentials = $request->validate([
            'nisn' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'nisn' => 'The provided credentials do not match our records.',
        ])->onlyInput('nisn');

    }

    // FUNGSI KE HALAMAN REGISTER
    public function registerSiswa() {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('siswa.register',[
            'kelas' => $kelas,
            'spp' => $spp
        ]);
    }

    // FUNGSI KE REGISTER NYA

    public function signupSiswa(Request $request) {
        $request->validate([
            'nisn' => ['required'],
            'nis' => ['required'],
            'nama' => ['required'],
            'id_kelas' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required'],
            'id_spp' => ['required'],
            'password' => ['required', 'min:8'],
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

        return back()->with('success', 'Berhasil Membuat Data Siswa Baru');
    }

}
