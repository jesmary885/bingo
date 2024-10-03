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
            'email' => 'jesmary8855@gmail.com',
            'password' => bcrypt('12345678'),
            'estado' => 'activo',
            'saldo' => '0',
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Jesmary',
            'email' => 'jesmary885@hotmail.com',
            'password' => bcrypt('12345678'),
            'estado' => 'activo',
            'saldo' => '20',
        ])->assignRole('Jugador');

        User::create([
            'name' => 'Jesmary2',
            'email' => 'jesmaryc885@hotmail.com',
            'password' => bcrypt('12345678'),
            'estado' => 'activo',
            'saldo' => '20',
        ])->assignRole('Jugador');

        User::create([
            'name' => 'Jesmary3',
            'email' => 'jesmarycc885@hotmail.com',
            'password' => bcrypt('12345678'),
            'estado' => 'activo',
            'saldo' => '20',
        ])->assignRole('Jugador');


    }
}
