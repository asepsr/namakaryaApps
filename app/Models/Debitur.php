<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Debitur extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'cabang_id',
        'mitra_id',
        'accountOfficer_id',
        'perusahaan_id',
        'name',
        'tglPengajuan',
        'noDebitur',
        'noKtp',
        'alamat',
        'tlp',
        'plafond',
        'jwk',
        'ibuKandung',
        'tmptLahir',
        'tglLahir',
        'namaPasangan',
        'tglLahirPasangan',
        'pendidikan',
        'statusKawin',
        'npwp',
        'domisili',
        'stsTinggal',
        'jenisPekerjaan',
        'lamaBekerja',
        'gaji',
        'status',
        'keterangan',
        'sttApprovel',
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_id');
    }

    public function accountofficer()
    {
        return $this->belongsTo(AccountOfficer::class, 'accountOfficer_id');
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'mitra_id');
    }

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }

    public function disbursemen()
    {
        return $this->belongsTo(Disbursement::class, 'debitur_id');
    }
}
