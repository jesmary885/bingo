<?php

namespace Database\Seeders;

use App\Models\CuentasUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuentaUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        CuentasUser::create([
            'user_id' => '2',
            'metodo_pago' => 'usdt',
            'correo_id' => 'jesmary885@hotmail.com',
            'identificativo' => 'USDT jesmary885@hotmail.com',
        ]);

    }
}
