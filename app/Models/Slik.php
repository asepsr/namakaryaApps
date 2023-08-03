<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slik extends Model
{
    use HasFactory;

        protected $fillable = [
            'debitur_id',
            'tglSlik',
            'statusKolek',
            'keterangan',
            'note',
            'status',
        ];

    public function debitur()
    {
        $debitur = $this->belongsTo(Debitur::class);

        return $debitur;
    }

        public function cabang()
        {
            return $this->belongsTo(Cabang::class);
        }

        public function mitra()
        {
            return $this->belongsTo(Mitra::class);
        }
}
