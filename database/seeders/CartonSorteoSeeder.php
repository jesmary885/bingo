<?php

namespace Database\Seeders;

use App\Models\CartonSorteo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartonSorteoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CartonSorteo::create([
            'sorteo_id' => '1',
            'carton_id' => '1',
            'status' => 'no disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '1',
            'carton_id' => '2',
            'status' => 'disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '1',
            'carton_id' => '3',
            'status' => 'disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '1',
            'carton_id' => '4',
            'status' => 'disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '1',
            'carton_id' => '5',
            'status' => 'reservado',
        ]);

        ///sorteo 2

        CartonSorteo::create([
            'sorteo_id' => '2',
            'carton_id' => '1',
            'status' => 'no disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '1',
            'carton_id' => '2',
            'status' => 'disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '2',
            'carton_id' => '3',
            'status' => 'disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '2',
            'carton_id' => '4',
            'status' => 'disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '2',
            'carton_id' => '5',
            'status' => 'reservado',
        ]);


        /// sorteo 3

        CartonSorteo::create([
            'sorteo_id' => '3',
            'carton_id' => '1',
            'status' => 'no disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '3',
            'carton_id' => '2',
            'status' => 'disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '3',
            'carton_id' => '3',
            'status' => 'disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '3',
            'carton_id' => '4',
            'status' => 'disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '3',
            'carton_id' => '5',
            'status' => 'disponible',
        ]);


    }
}
