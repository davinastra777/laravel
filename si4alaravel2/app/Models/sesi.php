<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}
