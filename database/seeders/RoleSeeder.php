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
        $role3 = Role::create(['name' => 'Administrador-All']);

        Permission::create(['name' => 'menu.admin',
        'description' => 'Ver menu admin'])->syncRoles([$role1]);


       Permission::create(['name' => 'Jugador',
        'description' => 'Ver web'])->syncRoles([$role2]);

        Permission::create(['name' => 'menu.adminAll',
        'description' => 'Ver menu admin All'])->syncRoles([$role3]);

        
    }
}
