<?php

namespace Database\Seeders;

use App\Models\Cabang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cabang::create([
            'name' => 'Namastra Kantor Pusat',
            'tlp' =>'(0251) 858 6888',
            'alamat'=>'Jl. Kolonel Achmad Syam No. 179C Tanah Baru, Bogor Utara - Bogor, Jawa Barat 16154',
        ]);

        Cabang::create([
            'name' => 'Namastra Cabang Pandu',
            'tlp' =>'(0251) 858 6888',
            'alamat'=>'Jl. Kolonel Achmad Syam No. 179C Tanah Baru, Bogor Utara - Bogor, Jawa Barat 16154',
        ]);

        Cabang::create([
            'name' => 'Namastra Cabang Otista',
            'tlp' =>'(0266) 622 7280',
            'alamat'=>'Jl. Otto Iskandardinata No 6, Kebonjati, Cikole - Kota Sukabumi, Jawa Barat 43111',
        ]);

        Cabang::create([
            'name' => 'Namastra Cabang Purwakarta',
            'tlp' =>'(0264) 839 1222',
            'alamat'=>'Jl. Jend. Ahmad Yani No.136, Cipaisan, Kec. Purwakarta, Kabupaten Purwakarta, Purwakarta, Jawa
            Barat 41114',
        ]);

        Cabang::create([
            'name' => 'Namastra Cabang Tangcity',
            'tlp' =>'(021) 5578 0084',
            'alamat'=>'Ruko Tangerang City, Jl. Jendral Sudirman No.1 Blok A/29 Cikokol - Tangerang 15117',
        ]);

        Cabang::create([
            'name' => 'Namastra Cabang Bandung',
            'tlp' =>'(022) 4282 8356',
            'alamat'=>'Jl. Moh Toha No. 187 Kel. Cigereleng Kec. Regol Kota Bandung, Jawa Barat 40253',
        ]);
    }
}
