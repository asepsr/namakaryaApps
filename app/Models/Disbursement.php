<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Disbursement extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'debitur_id',
        'tglDisburs',
        'NoSpk',
        'angsuran',
        'bunga',
        'admin',
        'provisi',
        'asuransi',
        'notaris',
        'simpPokok',
        'simpWajib',
        'tabungan',
        'hold',
        'materai',
        'biayaLainya',
        'status',
    ];

    public function debitur()
    {
        return $this->hasMany(Debitur::class, 'id');
    }
}
