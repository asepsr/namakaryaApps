<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
        DB::beginTransaction();
        try {
            $it = User::create(array_merge([
                'email' => 'it@gmail.com',
                'name' => 'it',
            ], $default_user_value));

            $cabang = User::create(array_merge([
                'email' => 'pandu@gmail.com',
                'name' => 'Namastra pandu',
                'cabang_id' => '2',
            ], $default_user_value));

            $mitra = User::create(array_merge([
                'email' => 'mcf@gmail.com',
                'name' => 'Mega Central Finance',
                'mitra_id' => '1',
            ], $default_user_value));

            $user = User::create(array_merge([
                'email' => 'user@gmail.com',
                'name' => 'User Biasa',
            ], $default_user_value));


            $role_it = Role::create(['name' => 'it']);
            $role_cabang = Role::create(['name' => 'cabang']);
            $role_mitra = Role::create(['name' => 'mitra']);
            $role_user = Role::create(['name' => 'user']);

            Permission::create((['name' => 'read Parameter']));
            $permisson = Permission::create(['name' => 'read roles']);
            $permisson = Permission::create(['name' => 'create roles']);
            $permisson = Permission::create(['name' => 'update roles']);
            $permisson = Permission::create(['name' => 'delete roles']);
            $permisson = Permission::create(['name' => 'edit roles']);
            $permisson = Permission::create(['name' => 'read cabang']);
            $permisson = Permission::create(['name' => 'create cabang']);
            $permisson = Permission::create(['name' => 'update cabang']);
            $permisson = Permission::create(['name' => 'delete cabang']);
            $permisson = Permission::create(['name' => 'edit cabang']);
            $permisson = Permission::create(['name' => 'read users']);
            $permisson = Permission::create(['name' => 'create users']);
            $permisson = Permission::create(['name' => 'update users']);
            $permisson = Permission::create(['name' => 'delete users']);
            $permisson = Permission::create(['name' => 'edit users']);
            $permisson = Permission::create(['name' => 'read menu']);
            $permisson = Permission::create(['name' => 'create menu']);
            $permisson = Permission::create(['name' => 'update menu']);
            $permisson = Permission::create(['name' => 'delete menu']);
            $permisson = Permission::create(['name' => 'edit menu']);
            $permisson = Permission::create(['name' => 'read permission']);
            $permisson = Permission::create(['name' => 'create permission']);
            $permisson = Permission::create(['name' => 'update permission']);
            $permisson = Permission::create(['name' => 'delete permission']);
            $permisson = Permission::create(['name' => 'edit permission']);
            $permisson = Permission::create(['name' => 'read mitra']);
            $permisson = Permission::create(['name' => 'create mitra']);
            $permisson = Permission::create(['name' => 'update mitra']);
            $permisson = Permission::create(['name' => 'delete mitra']);
            $permisson = Permission::create(['name' => 'edit mitra']);
            $permisson = Permission::create(['name' => 'read jabatan']);
            $permisson = Permission::create(['name' => 'create jabatan']);
            $permisson = Permission::create(['name' => 'update jabatan']);
            $permisson = Permission::create(['name' => 'delete jabatan']);
            $permisson = Permission::create(['name' => 'edit jabatan']);
            $permisson = Permission::create(['name' => 'read accountofficer']);
            $permisson = Permission::create(['name' => 'create accountofficer']);
            $permisson = Permission::create(['name' => 'update accountofficer']);
            $permisson = Permission::create(['name' => 'delete accountofficer']);
            $permisson = Permission::create(['name' => 'edit accountofficer']);


            $permisson = Permission::create(['name' => 'read perusahaan']);
            $permisson = Permission::create(['name' => 'create perusahaan']);
            $permisson = Permission::create(['name' => 'update perusahaan']);
            $permisson = Permission::create(['name' => 'delete perusahaan']);
            $permisson = Permission::create(['name' => 'edit perusahaan']);

            $permisson = Permission::create((['name' => 'read pengajuan pinjaman']));
            $permisson = Permission::create(['name' => 'read debitur']);
            $permisson = Permission::create(['name' => 'create debitur']);
            $permisson = Permission::create(['name' => 'update debitur']);
            $permisson = Permission::create(['name' => 'delete debitur']);
            $permisson = Permission::create(['name' => 'edit debitur']);


            Permission::create((['name' => 'read fasilitas pinjaman']));
            $permisson = Permission::create(['name' => 'read fasilitas']);
            $permisson = Permission::create(['name' => 'create fasilitas']);
            $permisson = Permission::create(['name' => 'update fasilitas']);
            $permisson = Permission::create(['name' => 'delete fasilitas']);
            $permisson = Permission::create(['name' => 'edit fasilitas']);

            $permisson = Permission::create(['name' => 'read status']);
            $permisson = Permission::create(['name' => 'read status mitra']);
            $permisson = Permission::create(['name' => 'read status cabang']);

            Permission::create((['name' => 'read analis']));
            $permisson = Permission::create(['name' => 'create analis']);
            $permisson = Permission::create(['name' => 'update analis']);
            $permisson = Permission::create(['name' => 'delete analis']);
            $permisson = Permission::create(['name' => 'edit analis']);
            $permisson = Permission::create(['name' => 'read dtanalis']);

            Permission::create((['name' => 'read disbursement']));
            $permisson = Permission::create(['name' => 'create disbursement']);
            $permisson = Permission::create(['name' => 'update disbursement']);
            $permisson = Permission::create(['name' => 'delete disbursement']);
            $permisson = Permission::create(['name' => 'edit disbursement']);

            Permission::create((['name' => 'read trash']));

            $role_it->givePermissionTo('read Parameter');
            $role_it->givePermissionTo('read roles');
            $role_it->givePermissionTo('create roles');
            $role_it->givePermissionTo('update roles');
            $role_it->givePermissionTo('delete roles');
            $role_it->givePermissionTo('edit roles');

            $role_it->givePermissionTo('read cabang');
            $role_it->givePermissionTo('create cabang');
            $role_it->givePermissionTo('update cabang');
            $role_it->givePermissionTo('delete cabang');
            $role_it->givePermissionTo('edit cabang');

            $role_it->givePermissionTo('read users');
            $role_it->givePermissionTo('create users');
            $role_it->givePermissionTo('update users');
            $role_it->givePermissionTo('delete users');
            $role_it->givePermissionTo('edit users');

            $role_it->givePermissionTo('read menu');
            $role_it->givePermissionTo('create menu');
            $role_it->givePermissionTo('update menu');
            $role_it->givePermissionTo('delete menu');
            $role_it->givePermissionTo('edit menu');

            $role_it->givePermissionTo('read permission');
            $role_it->givePermissionTo('create permission');
            $role_it->givePermissionTo('update permission');
            $role_it->givePermissionTo('delete permission');
            $role_it->givePermissionTo('edit permission');

            $role_it->givePermissionTo('read mitra');
            $role_it->givePermissionTo('create mitra');
            $role_it->givePermissionTo('update mitra');
            $role_it->givePermissionTo('delete mitra');
            $role_it->givePermissionTo('edit mitra');

            $role_it->givePermissionTo('read jabatan');
            $role_it->givePermissionTo('create jabatan');
            $role_it->givePermissionTo('update jabatan');
            $role_it->givePermissionTo('delete jabatan');
            $role_it->givePermissionTo('edit jabatan');
            $role_it->givePermissionTo('read status');

            $role_it->givePermissionTo('read accountofficer');
            $role_it->givePermissionTo('create accountofficer');
            $role_it->givePermissionTo('update accountofficer');
            $role_it->givePermissionTo('delete accountofficer');
            $role_it->givePermissionTo('edit accountofficer');

            $role_it->givePermissionTo('read perusahaan');
            $role_it->givePermissionTo('create perusahaan');
            $role_it->givePermissionTo('update perusahaan');
            $role_it->givePermissionTo('delete perusahaan');
            $role_it->givePermissionTo('edit perusahaan');

            $role_it->givePermissionTo('read pengajuan pinjaman');
            $role_it->givePermissionTo(['name' => 'read debitur']);
            $role_it->givePermissionTo(['name' => 'update debitur']);
            $role_it->givePermissionTo(['name' => 'delete debitur']);
            $role_it->givePermissionTo(['name' => 'edit debitur']);
            $role_it->givePermissionTo(['name' => 'read status']);


            $role_it->givePermissionTo('read analis');
            $role_it->givePermissionTo(['name' => 'read dtanalis']);
            $role_it->givePermissionTo(['name' => 'create analis']);
            $role_it->givePermissionTo(['name' => 'update analis']);
            $role_it->givePermissionTo(['name' => 'delete analis']);
            $role_it->givePermissionTo(['name' => 'edit analis']);

            $role_it->givePermissionTo('read disbursement');
            $role_it->givePermissionTo(['name' => 'read disbursement']);
            $role_it->givePermissionTo(['name' => 'create disbursement']);
            $role_it->givePermissionTo(['name' => 'update disbursement']);
            $role_it->givePermissionTo(['name' => 'delete disbursement']);
            $role_it->givePermissionTo(['name' => 'edit disbursement']);

            $role_it->givePermissionTo(['name' => 'read trash']);


            $role_mitra->givePermissionTo('read fasilitas pinjaman');
            $role_mitra->givePermissionTo(['name' => 'read fasilitas']);
            $role_mitra->givePermissionTo(['name' => 'update fasilitas']);
            $role_mitra->givePermissionTo(['name' => 'delete fasilitas']);
            $role_mitra->givePermissionTo(['name' => 'edit fasilitas']);
            $role_mitra->givePermissionTo(['name' => 'read status mitra']);

            $role_mitra->givePermissionTo('read disbursement');
            $role_mitra->givePermissionTo(['name' => 'read disbursement']);
            $role_mitra->givePermissionTo(['name' => 'create disbursement']);
            $role_mitra->givePermissionTo(['name' => 'update disbursement']);
            $role_mitra->givePermissionTo(['name' => 'delete disbursement']);
            $role_mitra->givePermissionTo(['name' => 'edit disbursement']);

            $role_cabang->givePermissionTo('read pengajuan pinjaman');
            $role_cabang->givePermissionTo(['name' => 'read debitur']);
            $role_cabang->givePermissionTo(['name' => 'create debitur']);
            $role_cabang->givePermissionTo(['name' => 'update debitur']);
            $role_cabang->givePermissionTo(['name' => 'delete debitur']);
            $role_cabang->givePermissionTo(['name' => 'edit debitur']);
            $role_cabang->givePermissionTo(['name' => 'read status cabang']);


            $cabang->assignRole('cabang');
            $mitra->assignRole('mitra');
            $it->assignRole('it');
            $user->assignRole('user');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
