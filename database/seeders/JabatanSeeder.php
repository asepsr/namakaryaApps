<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'name'=>'IT Support',
            'divisi'=>'Informasi Teknologi'
        ]);
        Jabatan::create([
            'name'=>'Lending Officer',
            'divisi'=>'Lending'
        ]);
        Jabatan::create([
            'name'=>'Funding Officer',
            'divisi'=>'Funding'
        ]);
    }
}
