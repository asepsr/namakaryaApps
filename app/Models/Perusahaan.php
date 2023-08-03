<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'mitraPekerja',
        'kopkar',
        'noPks',
        'tglPks',
        'lamaPks',
        'namaPerusahaan',
        'metodeAngsuran',
        'namaPic',
        'jabatanPic',
        'contactPic',
        'cabang_id',
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_id', 'id');
    }

    public function debitur()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id', 'id');
    }
}
