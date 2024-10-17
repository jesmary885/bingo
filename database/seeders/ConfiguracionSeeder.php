<?php

namespace Database\Seeders;

use App\Models\configuracion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfiguracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        configuracion::create([
            'referidos' => 'si',
        ]);

    }
}
