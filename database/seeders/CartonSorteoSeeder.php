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
            'status_carton' => 'Disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '1',
            'carton_id' => '2',
            'status_carton' => 'Disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '1',
            'carton_id' => '3',
            'status_carton' => 'Disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '1',
            'carton_id' => '4',
            'status_carton' => 'Disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '1',
            'carton_id' => '5',
            'status_carton' => 'Reservado',
        ]);

        ///sorteo 2

        CartonSorteo::create([
            'sorteo_id' => '2',
            'carton_id' => '1',
            'status_carton' => 'No disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '1',
            'carton_id' => '2',
            'status_carton' => 'Disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '2',
            'carton_id' => '3',
            'status_carton' => 'Disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '2',
            'carton_id' => '4',
            'status_carton' => 'Disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '2',
            'carton_id' => '5',
            'status_carton' => 'Reservado',
        ]);


        /// sorteo 3

        CartonSorteo::create([
            'sorteo_id' => '3',
            'carton_id' => '1',
            'status_carton' => 'No disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '3',
            'carton_id' => '2',
            'status_carton' => 'Disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '3',
            'carton_id' => '3',
            'status_carton' => 'Disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '3',
            'carton_id' => '4',
            'status_carton' => 'Disponible',
        ]);

        CartonSorteo::create([
            'sorteo_id' => '3',
            'carton_id' => '5',
            'status_carton' => 'Disponible',
        ]);


    }
}
