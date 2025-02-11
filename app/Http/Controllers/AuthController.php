<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signIn(Request $request) {
        if ($request->role == 'petugas') {
            //? Login Logic Buat Petugas
            $credentials = $request->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);

            if (Auth::guard('petugas')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('dashboardAdmin');
            }

            return back()->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ])->onlyInput('username');
        } else {
            //? Login Logic Buat Siswa
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
    }
}
