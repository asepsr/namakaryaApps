<?php

namespace Database\Seeders;

use App\Models\Mitra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mitra::create([
            'name' => 'Mega Central Finance (MCF)',
            'tlp' => '021-53666627',
            'alamat' => 'Gedung Wisma 76 Lt. 12
            Jl. Letjen S. Parman kav 76, Slipi
            Jakarta 11410, Indonesia',
            'statusSlik' => '1'
        ]);

        Mitra::create([
            'name' => 'PT BPRS Harta Insan Karimah',
            'tlp' => '(021) 730 1456',
            'alamat' => 'Kantor Pusat Menara HIK
            Jl. HOS Cokroaminoto No. 17 RT 001 RW 004 Kel. Karang Timur, Kec. Karang Tengah, Kota Tangerang, Banten,
            15159',
            'statusSlik' => '1'
        ]);

        Mitra::create([
            'name' => 'BPR Mitra Parahyangan ',
            'tlp' => '(022) 522 6212 ',
            'alamat' => 'Jl. BKR Lingkar Selatan No. 154 A Kec. Regol, Kota Bandung
            Jawa Barat, Indonesia',
            'statusSlik' => '1'
        ]);

        Mitra::create([
            'name' => 'BPR Samarason',
            'tlp' => '(021) 40643001',
            'alamat' => 'Apartemen Evenciio Lantai G, Jl. Margonda Raya No. 508 Pondok Cina, Kota Depok',
            'statusSlik' => '2'
        ]);

        Mitra::create([
            'name' => 'Koperasi Namastra LPDB',
            'tlp' => '(0251) 858 6888',
            'alamat' => 'Jl. Kolonel Achmad Syam No. 179C Tanah Baru, Bogor Utara - Bogor, Jawa Barat 16154',
            'statusSlik' => '2'
        ]);
    }
}
