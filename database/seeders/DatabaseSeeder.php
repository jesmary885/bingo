<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SorteoSeeder::class);
        $this->call(CartonSeeder::class);
        $this->call(CartonSorteoSeeder::class);
        $this->call(MetodopagoSeeder::class);

        $this->call(CuentaUserSeeder::class);
        $this->call(ConfiguracionSeeder::class);
    }
}
