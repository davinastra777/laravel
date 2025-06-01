<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index() {
        $mataKuliah = MataKuliah::with('prodi')->get();
        return view('mata_kuliah.index', compact('mataKuliah'));
    }

    public function create() {
        $prodis = Prodi::all();
        return view('mata_kuliah.create', compact('prodis'));
    }

    public function store(Request $request) {
        $request->validate([
            'kode_mk' => 'required',
            'nama' => 'required',
            'prodi_id' => 'required'
        ]);
        MataKuliah::create($request->all());
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata kuliah berhasil ditambahkan');
    }

    public function edit(MataKuliah $mata_kuliah) {
        $prodis = Prodi::all();
        return view('mata_kuliah.edit', compact('mata_kuliah', 'prodis'));
    }

    public function update(Request $request, MataKuliah $mata_kuliah) {
        $request->validate([
            'kode_mk' => 'required',
            'nama' => 'required',
            'prodi_id' => 'required'
        ]);
        $mata_kuliah->update($request->all());
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata kuliah berhasil diperbarui');
    }

    public function destroy(MataKuliah $mata_kuliah) {
        $mata_kuliah->delete();
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata kuliah berhasil dihapus');
    }
}
