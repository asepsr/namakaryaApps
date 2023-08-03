<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Menu Parameter

        Navigation::create([
            'name' => 'Parameter',
            'url' => 'Parameter',
            'icon' => 'mdi mdi-settings',
            'main_menu' => null,

        ]);
        Navigation::create([
            'name' => 'Manage User',
            'url' => 'users',
            'icon' => '',
            'main_menu' => 1,
        ]);
        Navigation::create([
            'name' => 'Manage cabang',
            'url' => 'cabang',
            'icon' => '',
            'main_menu' => 1,
        ]);
        Navigation::create([
            'name' => 'Manage Roles',
            'url' => 'roles',
            'icon' => '',
            'main_menu' => 1,
        ]);
        Navigation::create([
            'name' => 'Manage Menu',
            'url' => 'menu',
            'icon' => '',
            'main_menu' => 1,
        ]);
        Navigation::create([
            'name' => 'Manage Permission',
            'url' => 'permission',
            'icon' => '',
            'main_menu' => 1,
        ]);
        Navigation::create([
            'name' => 'Manage Mitra',
            'url' => 'mitra',
            'icon' => '',
            'main_menu' => 1,
        ]);
        Navigation::create([
            'name' => 'Manage Jabatan',
            'url' => 'jabatan',
            'icon' => '',
            'main_menu' => 1,
        ]);


        Navigation::create([
            'name' => 'Manage Accountofficer',
            'url' => 'accountofficer',
            'icon' => '',
            'main_menu' => 1,
        ]);

        Navigation::create([
            'name' => 'Manage Perusahaan',
            'url' => 'perusahaan',
            'icon' => '',
            'main_menu' => 1,
        ]);

        //Menu Pinjaman
        Navigation::create([
            'name' => 'Pengajuan Pinjaman',
            'url' => 'pengajuan pinjaman',
            'icon' => 'mdi mdi-database',
            'main_menu' => null,
        ]);
        Navigation::create([
            'name' => 'Data Debitur',
            'url' => 'debitur',
            'icon' => '',
            'main_menu' => 11,
        ]);

        //Menu Fasilitas
        Navigation::create([
            'name' => 'Fasilitas Pinjaman',
            'url' => 'fasilitas pinjaman',
            'icon' => 'mdi mdi-bank',
            'main_menu' => null,
        ]);

        Navigation::create([
            'name' => 'Data Fasilitas',
            'url' => 'fasilitas',
            'icon' => '',
            'main_menu' => 13,
        ]);

        //Menu Disburse
        Navigation::create([
            'name' => 'Data Finansial',
            'url' => 'disbursement',
            'icon' => 'mdi mdi-cash-multiple',
            'main_menu' => null,
        ]);
        Navigation::create([
            'name' => 'Disbursement',
            'url' => 'disbursement',
            'icon' => '',
            'main_menu' => 15,
        ]);
        Navigation::create([
            'name' => 'Perjanjian Pinjaman',
            'url' => '',
            'icon' => '',
            'main_menu' => 15,
        ]);
        Navigation::create([
            'name' => 'Penarikan Pinjaman',
            'url' => '',
            'icon' => '',
            'main_menu' => 15,
        ]);

        Navigation::create([
            'name' => 'Analis Kredit',
            'url' => 'analis',
            'icon' => 'mdi mdi-account-card-details',
            'main_menu' => null,
        ]);
        Navigation::create([
            'name' => 'Input Analis',
            'url' => 'analis',
            'icon' => '',
            'main_menu' => 19,
        ]);
        Navigation::create([
            'name' => 'Data Analis',
            'url' => 'dtAnalis',
            'icon' => '',
            'main_menu' => 19,
        ]);
    }
}
