<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function create() {
        return view('spp.buatspp',[
            'data' => null
        ]);
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

    public function edit(Request $request, Spp $spp) {
        return view('spp.edit',[
            'data' => $spp,
        ]);
    }

    public function update(Request $request, Spp $spp) {
        $request->validate([
            'tahun' => 'required',
            'semester' => 'required|in:ganjil,genap',
            'nominal' => 'required|numeric',
        ]);
        $spp->tahun = $request->tahun;
        $spp->semester = $request->semester;
        $spp->nominal = $request->nominal;
        $spp->save();
        return back()->with('success', 'Data SPP Berhasil Diperbarui');
    }

    public function destroy(Spp $spp) {
        $spp->delete();
        return back()->with('Data Spp Berhasil Dihapus');
    }
}
