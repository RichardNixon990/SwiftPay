<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // CREATE CLASS
    public function createClass() {
        return view('kelas.create',[
            'data' => null
        ]);
    }

    public function storeClass(Request $request) {
        $request->validate([
            'kelas' => 'required',
            'keahlian' => 'required',
        ]);
        $kelas = new Kelas();
        $kelas->nama_kelas = $request->kelas;
        $kelas->keahlian = $request->keahlian;
        $kelas->save();

        return back()->with('Kelas Berhasil Dibuat');
    }

    public function edit(Request $request, Kelas $kelas) {
        return view('Test.buatkelas',[
            'data' => $kelas
        ]);
    }

    public function update(Request $request, Kelas $kelas) {
        $request->validate([
            'kelas' => 'required',
            'keahlian' => 'required',
        ]);
        $kelas->nama_kelas = $request->kelas;
        $kelas->keahlian = $request->keahlian;
        $kelas->save();

        return back()->with('Kelas Berhasil Di Edit');
    }

    public function destroy(Kelas $kelas) {
        $kelas->delete();
        return back()->with('success','Kelas Berhasil Dihapus');
    }


}
