<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_akademik',
        'kode_smt',
        'kelas',
        'mata_kuliah_id',
        'dosen_id',
        'sesi_id',
    ];

    public function sesi()
    {
        return $this->belongsTo(Sesi::class);
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }
}
