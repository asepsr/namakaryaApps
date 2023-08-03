<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountOfficer extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabang_id',
        'name',
        'spv',
        'tlp',
        'alamat',
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_id', 'id');
    }

    public function debitur()
    {
        return $this->hasMany(Debitur::class, 'accountOfficer_id');
    }
}
