<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Sesi;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //panggil model jadwal dmenggunakan eloquent
        $jadwal = jadwal ::all(); // perintah sql select * from jadwal
        // dd($jadwal); // dump and die\
        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $mata_kuliah = MataKuliah::all();
    $sesi = Sesi::all();
    return view('jadwal.create', compact('mata_kuliah', 'sesi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi input
        $input = $request->validate([
            'tahun_akademik' => 'required',
            'kode_smt' => 'required',
            'kelas' => 'required',
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id',
            'sesi_id' => 'required|exists:sesi,id',
        ]);
        // simpan data ke tabel jadwal
        jadwal::create($input);
        // redirect ke route jadwal.index
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($jadwal)
    {
        $jadwal = jadwal::findOrFail($jadwal);
        //dd($jadwal);
        return view('jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($jadwal)
    {
        $jadwal = jadwal::findOrFail($jadwal);
        //dd($jadwal);
        return view('jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $jadwal)
    {
        $jadwal = jadwal::findOrFail($jadwal);
        // validasi input
        $input = $request->validate([
            'tahun_akademik' => 'required',
            'kode_smt' => 'required',
            'kelas' => 'required',
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id',
            'sesi_id' => 'required|exists:sesi,id',
        ]);
        // update data jadwal
        $jadwal->update($input);
        // redirect ke route jadwal.index
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($jadwal)
    {
        $jadwal = jadwal::findOrFail($jadwal);
        // dd($jadwal);

        // Hapus data jadwal
        $jadwal->delete();
        // Redirect ke route jadwal.index
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}