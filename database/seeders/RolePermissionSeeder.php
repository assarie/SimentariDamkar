<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'tambah-barang']);
        Permission::create(['name' => 'edit-barang']);
        Permission::create(['name' => 'lihat-barang']);
        Permission::create(['name' => 'hapus-barang']);

        Role::create(['name' => 'admin']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo(['tambah-barang', 'edit-barang', 'lihat-barang', 'hapus-barang']);
    }
}
