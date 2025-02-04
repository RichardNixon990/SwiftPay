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
    public function registerAdmin() {
        return view('admin.register'); // ini name viewnya
    }

    // FUNGSI KE REGISTER NYA

    public function signupAdmin(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|confirmed',
            'nama_petugas' => 'required',
            'level' => 'required|in:admin,petugas',
        ]);


        $petugas = new Petugas();
        $petugas->username = $request->username;
        $petugas->password = $request->password;
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->level = $request->level;
        $petugas->save();

        return back()->with('success', 'Berhasil Membuat Data Petugas Baru');
    }
}
