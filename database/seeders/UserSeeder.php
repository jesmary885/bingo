<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'jesmary885@gmail.com',
            'password' => bcrypt('12345678'),
            'estado' => 'activo',
            'saldo' => '0',
        ])->assignRole('Administrador');
    }
}
