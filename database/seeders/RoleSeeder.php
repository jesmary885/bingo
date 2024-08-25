<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Jugador']);


       Permission::create(['name' => 'web',
        'description' => 'Ver web'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'menu.admin',
        'description' => 'Ver menu admin'])->syncRoles([$role1]);
    }
}
