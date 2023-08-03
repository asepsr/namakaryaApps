<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analis extends Model
{
    use HasFactory;

    protected $fillable = [
        'debitur_id',
        'fasilitas_id',
        'cabang_id',
        'tglMpp',
        'jenisFasilitas',
        'noSurat',
        'tujuanFasilitas',
        'area',
        'namaLo',
        'namaCollection',
        'namaTl',
        'rate',
        'tenor',
        'noKontrak',
        'dataJaminan',
        'noBPJS',
        'saldoBpjs',
        'hasilLain',
        'jenisPengajuan',
        'deskripsi',
    ];
}
