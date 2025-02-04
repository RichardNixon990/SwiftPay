<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaAuth extends Controller
{
    // FUNGSI KE HALAMAN LOGIN
    public function loginSiswa() {
        return view('siswa.login'); // ini name viewnya
    }

    // FUNGSI LOGIN

    public function signinSiswa(Request $request) {
        $credentials = $request->validate([
            'nis' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'nis' => 'The provided credentials do not match our records.',
        ])->onlyInput('nis');

    }

    // FUNGSI KE HALAMAN REGISTER
    public function registerSiswa() {
        return view('siswa.register'); // ini name viewnya
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
        ]);

        $siswa = new Siswa();
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = $request->no_telp;
        $siswa->id_spp = $request->id_spp;
        $siswa->save();

        return back()->with('success', 'Berhasil Membuat Data Siswa Baru');
    }

}
