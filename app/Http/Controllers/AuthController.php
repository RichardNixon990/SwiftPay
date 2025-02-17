<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{

    public function login(){
        return view('page.Login_Register.Login');
    }
    public function signIn(Request $request)
    {
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
                return redirect()->intended(route('admin.dashboard'));
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
                return redirect()->intended(route('siswa.dashboard'));
            }

            return back()->withErrors([
                'nisn' => 'The provided credentials do not match our records.',
            ])->onlyInput('nisn');
        }
    }

    public function logoutAdmin(Request $request): RedirectResponse
    {
        Auth::guard('petugas')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function logoutSiswa(Request $request): RedirectResponse
    {
        Auth::guard('siswa')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
