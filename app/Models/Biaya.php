<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Biaya extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'namaBiaya',
        'bunga',
        'provisi',
        'admin',
        'asuransi',
        'notaris',
        'simpPokok',
        'simpWajib',
        'tabungan',
        'hold',
        'materai',
    ];
}
