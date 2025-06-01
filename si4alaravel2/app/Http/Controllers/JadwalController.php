<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Matakuliah; 
use App\Models\Dosen;
use App\Models\Sesi;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // panggil model jadwal menggunakan eloquent
        $jadwal = jadwal::all(); // perintah SQL select * from jadwal
        //dd($jadwal); //dump and die
        return view('jadwal.index', compact('jadwal')); // bisa pake with
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $matakuliah = Matakuliah::all();
    // $dosen = Dosen::all(); 
    $sesi = Sesi::all(); 
    return view('jadwal.create', compact('matakuliah', 'dosen', 'sesi'));
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
public function store(Request $request) {
        $request->validate([
            'tahun_akademik' => 'required',
            'kode_smt' => 'required',
            'kelas' => 'required',
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'sesi_id' => 'required',
        ]);
        Jadwal::create($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show( $jadwal)
    {
        $jadwal = jadwal::findorFail($jadwal);
        // dd($jadwal);
        return view('jadwal.show', compact('jadwal'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit($jadwal)
    {
        $jadwal = jadwal::findOrFail($jadwal);
        return view ('jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal) {
        $request->validate([
            'tahun_akademik' => 'required',
            'kode_smt' => 'required',
            'kelas' => 'required',
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'sesi_id' => 'required',
        ]);
        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($jadwal)
    {
        $jadwal = jadwal::findOrFail($jadwal);
        // dd($jadwal);
        // hapus data jadwal
        $jadwal->delete();
        // redirect ke halaman jadwal.index
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }
}
