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
            'content_1' => json_encode(['1','18','35','51','60']),
            'content_2' => json_encode(['2','20','37','53','62']),
            'content_3' => json_encode(['3','25','38','54','63']),
            'content_4' => json_encode(['4','26','39','56','65']),
            'content_5' => json_encode(['65','30','40','58','70']),
            'serial' => '123456789101712'
        ]);

        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','4','8','10','15']),
            'content_2' => json_encode(['22','24','26','28','30']),
            'content_3' => json_encode(['33','35','38','44','45']),
            'content_4' => json_encode(['51','53','54','58','60']),
            'content_5' => json_encode(['62','65','73','74','75']),
            'serial' => '123456789101162'
        ]);

        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','2','33','4','15']),
            'content_2' => json_encode(['1','44','3','4','15']),
            'content_3' => json_encode(['1','33','3','4','15']),
            'content_4' => json_encode(['1','2','11','4','15']),
            'content_5' => json_encode(['1','45','3','4','15']),
            'serial' => '123456789105112'
        ]);

        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','2','3','41','15']),
            'content_2' => json_encode(['1','44','3','4','15']),
            'content_3' => json_encode(['1','33','3','4','15']),
            'content_4' => json_encode(['1','2','11','4','15']),
            'content_5' => json_encode(['1','45','3','4','15']),
            'serial' => '123456789101114'
        ]);

        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','2','3','4','15']),
            'content_2' => json_encode(['1','44','3','4','15']),
            'content_3' => json_encode(['1','33','3','4','15']),
            'content_4' => json_encode(['1','2','11','4','15']),
            'content_5' => json_encode(['1','45','3','4','15']),
            'serial' => '123456789101113'
        ]);


    }
}
