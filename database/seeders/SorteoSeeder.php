<?php

namespace Database\Seeders;

use App\Models\Sorteo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SorteoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sorteo::create([
            'fecha_ejecucion' => '2024-08-25 9:00:00',
            'type_1' => 'Tradicional',
            'status' => 'Aperturado',
            'precio_carton_dolar' => '1',
            'porcentaje_ganancia' => '70'
        ]);

       


    }
}
