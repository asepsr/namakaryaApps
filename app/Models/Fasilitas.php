<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'mitra_id',
        'debitur_id',
        'user_id',
        'cabang_id',
        'noFasilitas',
        'fasilitas',
        'statusKolek',
        'slik',
        'note',
        'alasanTolak',
        'plafondRekomendasi',
    ];

    public function debitur()
    {
        return $this->belongsTo(Debitur::class, 'debitur_id');
    }

    // Definisikan relasi antara Fasilitas dan Mitra
    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'mitra_id');
    }
}
