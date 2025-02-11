<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signIn(Request $request) {
        $request->validate([
            'usn' => 'required',
            'password' => 'required',
        ]);
        if ($request->role == 'petugas') {

            //? Login Logic Buat Petugas
            $credentials = [
                'username' => $request->usn,
                'password' => $request->password,
            ];

            if (Auth::guard('petugas')->attempt($credentials)) {
                $request->session()->regenerate();
                return [
                    'message' => 'Login Berhasil jadi petugas',
                    'nama_petugas' => Auth::guard('petugas')->user()->nama_petugas,
                ];
                return redirect()->intended('dashboardAdmin');
            }

            return back()->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ])->onlyInput('username');
        } else {
            //? Login Logic Buat Siswa
            $credentials = [
                'nisn' => $request->usn,
                'password' => $request->password,
            ];

            if (Auth::guard('siswa')->attempt($credentials)) {
                $request->session()->regenerate();
                return [
                    'message' => 'Login Berhasil jadi siswa',
                    'siswa' => Auth::guard('siswa')->user()->nama,
                ];
                return redirect()->intended('dashboard');
            }

            return back()->withErrors([
                'nisn' => 'The provided credentials do not match our records.',
            ])->onlyInput('nisn');
        }
    }
}
