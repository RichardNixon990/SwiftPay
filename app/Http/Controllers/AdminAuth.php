<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth extends Controller
{
    // LOGIN
    public function signinAdmin() {
        return view('admin.auth.signin');
    }
    public function loginAdmin(Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboardAdmin');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    // REGIST

    // FUNGSI KE HALAMAN REGISTER
    public function registerSiswa() {
        return view('siswa.register'); // ini name viewnya
    }

    // FUNGSI KE REGISTER NYA

    public function signupSiswa(Request $request) {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'confim_password' => ['required', 'confirmed'],
            'nama_petugas' => ['required'],
            'level' => ['required'],

        ]);

        $petugas = new Petugas();
        $petugas->username = $request->username;
        $petugas->password = $request->password;
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->level = $request->level;
        $petugas->save();

        return back()->with('Berhasil Membuat Data Petugas Baru');
    }
}
