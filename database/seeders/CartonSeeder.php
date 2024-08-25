<?php

namespace Database\Seeders;

use App\Models\Carton;
use Faker\Core\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','2','3','4','15']),
            'content_2' => json_encode(['1','44','3','4','15']),
            'content_3' => json_encode(['1','33','3','4','15']),
            'content_4' => json_encode(['1','2','11','4','15']),
            'content_5' => json_encode(['1','45','3','4','15']),
        ]);

        DB::table('cartons')->insert([
            'content_1' => json_encode(['11','2','33','4','15']),
            'content_2' => json_encode(['1','44','3','4','15']),
            'content_3' => json_encode(['1','33','3','4','15']),
            'content_4' => json_encode(['1','2','11','4','15']),
            'content_5' => json_encode(['1','45','3','4','15']),
        ]);

        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','2','33','4','15']),
            'content_2' => json_encode(['1','44','3','4','15']),
            'content_3' => json_encode(['1','33','3','4','15']),
            'content_4' => json_encode(['1','2','11','4','15']),
            'content_5' => json_encode(['1','45','3','4','15']),
        ]);

        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','2','3','41','15']),
            'content_2' => json_encode(['1','44','3','4','15']),
            'content_3' => json_encode(['1','33','3','4','15']),
            'content_4' => json_encode(['1','2','11','4','15']),
            'content_5' => json_encode(['1','45','3','4','15']),
        ]);

        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','2','3','4','15']),
            'content_2' => json_encode(['1','44','3','4','15']),
            'content_3' => json_encode(['1','33','3','4','15']),
            'content_4' => json_encode(['1','2','11','4','15']),
            'content_5' => json_encode(['1','45','3','4','15']),
        ]);


    }
}
