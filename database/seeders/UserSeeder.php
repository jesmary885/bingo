<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserSaldo;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@admin.com',
            'password' => bcrypt('**BingoSuperAdmin2025**'),
            'estado' => 'activo',
            'codigo_referido' => 'b-1',
        ])->assignRole(['Administrador-All','Administrador','Jugador']);

        UserSaldo::create([
            'saldo' => '0',
            'user_id' => $user1->id
        ]);

        $user2 = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('**BingoAdmin2025**'),
            'estado' => 'activo',
            'codigo_referido' => 'b-1',
        ])->assignRole(['Administrador','Jugador']);

        UserSaldo::create([
            'saldo' => '0',
            'user_id' => $user2->id
        ]);


        $user5 = User::create([
            'name' => 'Jesmary',
            'email' => 'jesmary885@hotmail.com',
            'password' => bcrypt('12345678'),
            'estado' => 'activo',
            'codigo_referido' => 'b-2',
        ])->assignRole('Jugador');

        UserSaldo::create([
            'saldo' => '0',
            'user_id' => $user5->id
        ]);

        $user3 = User::create([
            'name' => 'Jesmary2',
            'email' => 'jesmaryc885@hotmail.com',
            'password' => bcrypt('12345678'),
            'estado' => 'activo',
            'codigo_referido' => 'b-3',
        ])->assignRole('Jugador');

        UserSaldo::create([
            'saldo' => '0',
            'user_id' => $user3->id
        ]);

        $user4 = User::create([
            'name' => 'Jesmary3',
            'email' => 'jesmarycc885@hotmail.com',
            'password' => bcrypt('12345678'),
            'estado' => 'activo',
            'codigo_referido' => 'b-4',
        ])->assignRole('Jugador');

        UserSaldo::create([
            'saldo' => '0',
            'user_id' => $user4->id
        ]);

    }
}
