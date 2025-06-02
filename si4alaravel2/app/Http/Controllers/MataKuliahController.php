<?php

namespace App\Http\Controllers;

use App\Models\mataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //panggil model mata_kuliah dmenggunakan eloquent
        $MataKuliah = MataKuliah ::all(); // perintah sql select * from mata_kuliah
        // dd($mata_kuliah); // dump and die\
        return view('mata_kuliah.index', compact('mata_kuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mata_kuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi input
        $input = $request->validate([
            'nama' => 'required|unique:mata_kuliah',
            'kode_mk' => 'required|unique:mata_kuliah'
        ]);
        // simpan data ke tabel mata_kuliah
        MataKuliah::create($input);
        // redirect ke route mata_kuliah.index
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($mata_kuliah)
    {
        $mata_kuliah = MataKuliah::findOrFail($mata_kuliah);
        //dd($mata_kuliah);
        return view('mata_kuliah.show', compact('mata_kuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($mata_kuliah)
    {
        $mata_kuliah = MataKuliah::findOrFail($mata_kuliah);
        //dd($mata_kuliah);
        return view('mata_kuliah.edit', compact('mata_kuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $mata_kuliah)
    {
        $mata_kuliah = MataKuliah::findOrFail($mata_kuliah);
        // validasi input
        $input = $request->validate([
            'nama' => 'required',
            'kode_mk' => 'required|unique:mata_kuliah,kode_mk,'
        ]);
        // update data mata_kuliah
        $mata_kuliah->update($input);
        // redirect ke route mata_kuliah.index
        return redirect()->route('mata_kuliah.index')->with('success', 'mata_kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($mata_kuliah)
    {
        $mata_kuliah = MataKuliah::findOrFail($mata_kuliah);
        // dd($mata_kuliah);

        // Hapus data mata_kuliah
        $mata_kuliah->delete();
        // Redirect ke route mata_kuliah.index
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil dihapus.');
    }
}