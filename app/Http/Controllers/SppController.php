<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function create() {
        return view('spp.buatspp');
    }

    public function store(Request $request) {
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
}
