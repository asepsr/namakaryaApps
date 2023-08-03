<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bankloan extends Model
{
    use HasFactory;

            protected $fillable = [
                'analis_number',
                'bankName',
                'loan',
                'outstanding',
                'angsuran',
                'tujuanPinjaman',
                'keterangan',
                'statusPinjaman'
            ];
}
