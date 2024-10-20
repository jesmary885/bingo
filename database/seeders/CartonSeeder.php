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
            'content_1' => json_encode(['3','21','42','53','63']),
            'content_2' => json_encode(['5','29','38','56','69']),
            'content_3' => json_encode(['1','17','31','48','74']),
            'content_4' => json_encode(['7','19','32','57','72']),
            'content_5' => json_encode(['2','24','34','46','71']),
            'serial' => '123456789101162'
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','29','39','47','74']),
            'content_2' => json_encode(['14','22','32','52','63']),
            'content_3' => json_encode(['8','24','42','57','71']),
            'content_4' => json_encode(['2','25','41','53','72']),
            'content_5' => json_encode(['15','21','40','48','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','21','39','48','64']),
            'content_2' => json_encode(['9','18','32','47','62']),
            'content_3' => json_encode(['15','29','31','46','72']),
            'content_4' => json_encode(['3','22','40','52','69']),
            'content_5' => json_encode(['7','17','34','53','68']),
            'serial' => ''
        ]);
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','29','31','47','63']),
            'content_2' => json_encode(['5','17','39','48','66']),
            'content_3' => json_encode(['4','25','41','56','74']),
            'content_4' => json_encode(['9','23','45','51','69']),
            'content_5' => json_encode(['14','18','42','49','71']),
            'serial' => ''
        ]);
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','20','38','47','69']),
            'content_2' => json_encode(['3','17','40','49','68']),
            'content_3' => json_encode(['7','19','44','56','66']),
            'content_4' => json_encode(['5','21','45','52','62']),
            'content_5' => json_encode(['1','24','31','50','71']),
            'serial' => ''
        ]);
        DB::table('cartons')->insert([
            'content_1' => json_encode(['9','19','42','51','68']),
            'content_2' => json_encode(['3','18','31','47','62']),
            'content_3' => json_encode(['15','23','34','49','63']),
            'content_4' => json_encode(['4','21','32','53','66']),
            'content_5' => json_encode(['8','24','41','52','61']),
            'serial' => ''
        ]);
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','18','45','47','69']),
            'content_2' => json_encode(['15','21','42','46','62']),
            'content_3' => json_encode(['2','22','38','56','74']),
            'content_4' => json_encode(['7','24','41','57','66']),
            'content_5' => json_encode(['8','29','40','49','61']),
            'serial' => ''
        ]);
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','19','45','56','63']),
            'content_2' => json_encode(['5','24','44','46','66']),
            'content_3' => json_encode(['3','23','42','53','63']),
            'content_4' => json_encode(['15','17','34','50','74']),
            'content_5' => json_encode(['2','22','41','52','69']),
            'serial' => ''
        ]);
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','18','34','52','62']),
            'content_2' => json_encode(['1','29','40','56','71']),
            'content_3' => json_encode(['15','23','45','49','74']),
            'content_4' => json_encode(['3','21','31','53','64']),
            'content_5' => json_encode(['7','22','32','51','63']),
            'serial' => ''
        ]);
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','24','32','51','69']),
            'content_2' => json_encode(['14','23','31','49','74']),
            'content_3' => json_encode(['4','17','45','53','62']),
            'content_4' => json_encode(['7','25','34','57','63']),
            'content_5' => json_encode(['9','21','44','52','64']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','18','40','51','61']),
            'content_2' => json_encode(['15','21','39','53','66']),
            'content_3' => json_encode(['1','24','44','49','69']),
            'content_4' => json_encode(['3','25','31','48','63']),
            'content_5' => json_encode(['5','20','34','57','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','23','38','51','69']),
            'content_2' => json_encode(['5','25','39','46','66']),
            'content_3' => json_encode(['14','19','34','57','72']),
            'content_4' => json_encode(['4','17','32','52','64']),
            'content_5' => json_encode(['3','20','41','47','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['7','25','31','52','66']),
            'content_2' => json_encode(['14','17','45','56','61']),
            'content_3' => json_encode(['9','23','32','47','69']),
            'content_4' => json_encode(['3','19','39','48','62']),
            'content_5' => json_encode(['1','18','34','50','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','22','32','49','72']),
            'content_2' => json_encode(['14','23','31','53','74']),
            'content_3' => json_encode(['3','25','40','50','61']),
            'content_4' => json_encode(['8','19','45','48','62']),
            'content_5' => json_encode(['2','17','41','46','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['9','24','42','53','68']),
            'content_2' => json_encode(['5','20','44','56','71']),
            'content_3' => json_encode(['2','22','38','50','74']),
            'content_4' => json_encode(['1','18','45','52','63']),
            'content_5' => json_encode(['3','19','41','46','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','20','44','46','74']),
            'content_2' => json_encode(['1','29','41','57','71']),
            'content_3' => json_encode(['3','23','42','51','62']),
            'content_4' => json_encode(['7','24','34','48','64']),
            'content_5' => json_encode(['9','22','45','52','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','21','42','53','69']),
            'content_2' => json_encode(['14','18','32','47','64']),
            'content_3' => json_encode(['8','22','34','57','66']),
            'content_4' => json_encode(['2','23','40','48','63']),
            'content_5' => json_encode(['1','17','31','52','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','29','42','47','63']),
            'content_2' => json_encode(['8','21','34','46','66']),
            'content_3' => json_encode(['5','17','44','48','74']),
            'content_4' => json_encode(['3','22','45','49','62']),
            'content_5' => json_encode(['7','23','39','52','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','21','42','48','62']),
            'content_2' => json_encode(['15','20','34','50','68']),
            'content_3' => json_encode(['3','18','45','49','61']),
            'content_4' => json_encode(['9','25','39','46','64']),
            'content_5' => json_encode(['14','22','41','56','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','19','41','52','63']),
            'content_2' => json_encode(['1','23','44','49','71']),
            'content_3' => json_encode(['9','29','39','57','66']),
            'content_4' => json_encode(['3','20','32','48','64']),
            'content_5' => json_encode(['5','25','40','47','74']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','20','38','47','69']),
            'content_2' => json_encode(['2','22','32','53','74']),
            'content_3' => json_encode(['14','23','31','51','61']),
            'content_4' => json_encode(['15','17','41','56','68']),
            'content_5' => json_encode(['5','29','39','50','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','19','42','51','64']),
            'content_2' => json_encode(['8','20','34','48','74']),
            'content_3' => json_encode(['3','24','34','47','62']),
            'content_4' => json_encode(['15','25','40','49','71']),
            'content_5' => json_encode(['1','17','44','50','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','18','34','52','61']),
            'content_2' => json_encode(['7','20','44','56','66']),
            'content_3' => json_encode(['15','24','42','57','64']),
            'content_4' => json_encode(['4','19','39','51','71']),
            'content_5' => json_encode(['9','25','45','53','74']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','19','45','50','69']),
            'content_2' => json_encode(['14','29','41','49','71']),
            'content_3' => json_encode(['2','25','44','49','72']),
            'content_4' => json_encode(['1','21','31','47','68']),
            'content_5' => json_encode(['9','20','39','46','64']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','23','34','52','74']),
            'content_2' => json_encode(['8','21','31','47','62']),
            'content_3' => json_encode(['4','25','38','51','68']),
            'content_4' => json_encode(['9','17','45','49','61']),
            'content_5' => json_encode(['1','20','40','56','72']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','24','38','53','61']),
            'content_2' => json_encode(['15','25','32','47','64']),
            'content_3' => json_encode(['14','22','40','56','66']),
            'content_4' => json_encode(['2','29','45','48','72']),
            'content_5' => json_encode(['4','19','34','50','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['9','23','40','51','66']),
            'content_2' => json_encode(['3','20','44','50','64']),
            'content_3' => json_encode(['8','17','31','47','63']),
            'content_4' => json_encode(['15','22','34','52','62']),
            'content_5' => json_encode(['14','18','32','48','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','22','40','53','61']),
            'content_2' => json_encode(['14','29','38','56','68']),
            'content_3' => json_encode(['7','21','44','51','71']),
            'content_4' => json_encode(['8','24','34','50','69']),
            'content_5' => json_encode(['15','23','45','49','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['9','24','31','57','64']),
            'content_2' => json_encode(['1','22','41','47','62']),
            'content_3' => json_encode(['15','25','34','48','66']),
            'content_4' => json_encode(['2','18','38','52','62']),
            'content_5' => json_encode(['14','17','40','53','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','22','40','48','74']),
            'content_2' => json_encode(['8','24','32','53','64']),
            'content_3' => json_encode(['2','19','41','46','68']),
            'content_4' => json_encode(['3','25','38','56','63']),
            'content_5' => json_encode(['5','18','44','52','72']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','22','44','50','65']),
            'content_2' => json_encode(['5','20','39','51','71']),
            'content_3' => json_encode(['1','19','45','53','69']),
            'content_4' => json_encode(['3','21','42','56','63']),
            'content_5' => json_encode(['8','24','41','48','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['9','18','39','47','71']),
            'content_2' => json_encode(['14','22','31','52','61']),
            'content_3' => json_encode(['5','29','41','53','69']),
            'content_4' => json_encode(['7','25','45','46','74']),
            'content_5' => json_encode(['3','20','42','50','64']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','29','44','49','64']),
            'content_2' => json_encode(['14','21','41','47','69']),
            'content_3' => json_encode(['9','19','32','50','63']),
            'content_4' => json_encode(['2','18','39','51','68']),
            'content_5' => json_encode(['5','25','42','56','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','25','44','56','71']),
            'content_2' => json_encode(['7','18','32','51','66']),
            'content_3' => json_encode(['8','24','42','47','61']),
            'content_4' => json_encode(['4','19','31','50','69']),
            'content_5' => json_encode(['2','21','39','49','74']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','29','38','47','69']),
            'content_2' => json_encode(['5','20','34','50','68']),
            'content_3' => json_encode(['7','23','42','48','72']),
            'content_4' => json_encode(['9','24','32','46','64']),
            'content_5' => json_encode(['4','17','45','53','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','18','44','56','68']),
            'content_2' => json_encode(['9','17','38','57','61']),
            'content_3' => json_encode(['3','25','32','50','74']),
            'content_4' => json_encode(['5','23','31','48','64']),
            'content_5' => json_encode(['2','20','42','49','72']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','18','34','56','72']),
            'content_2' => json_encode(['9','23','42','47','63']),
            'content_3' => json_encode(['3','29','41','57','71']),
            'content_4' => json_encode(['14','17','31','48','68']),
            'content_5' => json_encode(['1','25','38','52','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','23','44','57','69']),
            'content_2' => json_encode(['2','21','32','48','64']),
            'content_3' => json_encode(['7','22','39','49','63']),
            'content_4' => json_encode(['9','24','34','46','68']),
            'content_5' => json_encode(['15','17','38','47','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','19','32','46','72']),
            'content_2' => json_encode(['7','17','45','51','68']),
            'content_3' => json_encode(['8','21','41','56','74']),
            'content_4' => json_encode(['4','29','39','52','61']),
            'content_5' => json_encode(['14','24','31','53','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','24','41','51','68']),
            'content_2' => json_encode(['9','19','45','49','61']),
            'content_3' => json_encode(['2','18','42','46','62']),
            'content_4' => json_encode(['14','23','44','47','66']),
            'content_5' => json_encode(['4','22','39','52','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','19','31','50','61']),
            'content_2' => json_encode(['2','21','32','47','74']),
            'content_3' => json_encode(['15','18','45','52','64']),
            'content_4' => json_encode(['9','20','34','56','68']),
            'content_5' => json_encode(['7','22','42','51','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','22','45','57','72']),
            'content_2' => json_encode(['7','25','32','53','66']),
            'content_3' => json_encode(['3','29','44','48','62']),
            'content_4' => json_encode(['14','23','40','46','64']),
            'content_5' => json_encode(['9','20','42','47','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','19','39','57','74']),
            'content_2' => json_encode(['4','17','40','48','72']),
            'content_3' => json_encode(['14','25','38','49','69']),
            'content_4' => json_encode(['8','23','34','52','62']),
            'content_5' => json_encode(['5','20','44','56','64']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','17','34','57','72']),
            'content_2' => json_encode(['14','22','38','50','61']),
            'content_3' => json_encode(['2','23','45','52','66']),
            'content_4' => json_encode(['9','24','44','51','71']),
            'content_5' => json_encode(['1','20','32','53','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','23','44','50','63']),
            'content_2' => json_encode(['14','18','31','47','64']),
            'content_3' => json_encode(['9','24','42','51','74']),
            'content_4' => json_encode(['1','22','40','52','61']),
            'content_5' => json_encode(['7','21','34','49','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['7','20','34','47','61']),
            'content_2' => json_encode(['2','24','32','46','62']),
            'content_3' => json_encode(['1','25','38','53','64']),
            'content_4' => json_encode(['4','23','40','50','69']),
            'content_5' => json_encode(['8','17','45','49','74']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','17','39','53','63']),
            'content_2' => json_encode(['4','19','45','48','61']),
            'content_3' => json_encode(['5','29','42','52','68']),
            'content_4' => json_encode(['7','21','31','50','71']),
            'content_5' => json_encode(['1','18','44','47','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','29','40','48','66']),
            'content_2' => json_encode(['14','23','45','56','61']),
            'content_3' => json_encode(['15','17','44','50','68']),
            'content_4' => json_encode(['8','24','32','57','63']),
            'content_5' => json_encode(['2','18','42','51','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','20','42','48','63']),
            'content_2' => json_encode(['2','21','38','53','74']),
            'content_3' => json_encode(['3','25','40','46','71']),
            'content_4' => json_encode(['1','29','32','47','72']),
            'content_5' => json_encode(['9','19','45','51','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['9','18','39','46','64']),
            'content_2' => json_encode(['7','24','32','48','72']),
            'content_3' => json_encode(['2','23','41','57','71']),
            'content_4' => json_encode(['5','17','31','51','69']),
            'content_5' => json_encode(['1','22','40','47','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','20','45','49','68']),
            'content_2' => json_encode(['5','17','44','50','71']),
            'content_3' => json_encode(['15','29','31','53','62']),
            'content_4' => json_encode(['9','24','42','46','74']),
            'content_5' => json_encode(['8','21','41','57','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','19','42','51','64']),
            'content_2' => json_encode(['4','17','40','52','61']),
            'content_3' => json_encode(['8','21','38','48','69']),
            'content_4' => json_encode(['9','23','41','50','62']),
            'content_5' => json_encode(['14','18','44','53','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','29','38','46','62']),
            'content_2' => json_encode(['2','18','40','53','74']),
            'content_3' => json_encode(['5','17','34','56','72']),
            'content_4' => json_encode(['14','20','44','48','68']),
            'content_5' => json_encode(['4','23','32','50','64']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','19','42','51','68']),
            'content_2' => json_encode(['15','21','31','47','62']),
            'content_3' => json_encode(['2','29','32','50','71']),
            'content_4' => json_encode(['14','18','39','46','66']),
            'content_5' => json_encode(['9','24','34','53','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','25','40','47','62']),
            'content_2' => json_encode(['7','17','44','48','68']),
            'content_3' => json_encode(['14','23','38','46','63']),
            'content_4' => json_encode(['15','20','42','52','71']),
            'content_5' => json_encode(['8','19','34','49','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','23','45','57','62']),
            'content_2' => json_encode(['4','19','40','49','61']),
            'content_3' => json_encode(['7','22','31','47','63']),
            'content_4' => json_encode(['15','21','34','52','72']),
            'content_5' => json_encode(['2','20','41','48','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','18','40','51','66']),
            'content_2' => json_encode(['1','29','32','53','62']),
            'content_3' => json_encode(['9','19','39','49','74']),
            'content_4' => json_encode(['3','21','34','56','71']),
            'content_5' => json_encode(['7','23','38','52','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','17','32','50','74']),
            'content_2' => json_encode(['5','20','42','53','72']),
            'content_3' => json_encode(['7','19','39','51','63']),
            'content_4' => json_encode(['9','22','45','46','66']),
            'content_5' => json_encode(['3','18','40','49','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','24','40','50','71']),
            'content_2' => json_encode(['7','17','39','56','66']),
            'content_3' => json_encode(['4','18','34','48','68']),
            'content_4' => json_encode(['1','29','31','57','63']),
            'content_5' => json_encode(['3','21','44','46','72']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','21','32','48','74']),
            'content_2' => json_encode(['4','29','38','49','61']),
            'content_3' => json_encode(['3','17','42','56','64']),
            'content_4' => json_encode(['5','18','39','51','68']),
            'content_5' => json_encode(['1','24','45','57','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','17','39','53','66']),
            'content_2' => json_encode(['14','18','31','51','69']),
            'content_3' => json_encode(['3','23','41','52','71']),
            'content_4' => json_encode(['4','22','40','49','64']),
            'content_5' => json_encode(['9','19','32','46','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','21','31','49','66']),
            'content_2' => json_encode(['15','25','42','51','64']),
            'content_3' => json_encode(['4','18','45','52','74']),
            'content_4' => json_encode(['5','23','40','53','69']),
            'content_5' => json_encode(['3','24','41','47','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','21','41','57','64']),
            'content_2' => json_encode(['3','17','34','46','72']),
            'content_3' => json_encode(['7','25','32','56','62']),
            'content_4' => json_encode(['5','23','31','51','68']),
            'content_5' => json_encode(['15','20','38','50','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','25','39','47','63']),
            'content_2' => json_encode(['4','23','40','56','69']),
            'content_3' => json_encode(['1','24','34','48','72']),
            'content_4' => json_encode(['14','22','31','57','74']),
            'content_5' => json_encode(['15','17','38','53','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','22','41','47','68']),
            'content_2' => json_encode(['9','29','31','51','63']),
            'content_3' => json_encode(['7','21','45','46','66']),
            'content_4' => json_encode(['1','20','42','53','64']),
            'content_5' => json_encode(['5','19','32','57','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['7','29','31','52','63']),
            'content_2' => json_encode(['9','24','42','46','72']),
            'content_3' => json_encode(['3','22','44','50','66']),
            'content_4' => json_encode(['2','17','38','51','61']),
            'content_5' => json_encode(['1','20','34','56','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','18','42','46','62']),
            'content_2' => json_encode(['4','17','45','56','71']),
            'content_3' => json_encode(['9','20','40','52','74']),
            'content_4' => json_encode(['14','21','31','53','64']),
            'content_5' => json_encode(['3','29','44','51','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['9','25','41','52','63']),
            'content_2' => json_encode(['4','19','38','57','69']),
            'content_3' => json_encode(['2','23','44','53','71']),
            'content_4' => json_encode(['8','22','40','48','64']),
            'content_5' => json_encode(['3','17','39','49','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','25','45','52','69']),
            'content_2' => json_encode(['8','23','41','53','62']),
            'content_3' => json_encode(['15','24','39','46','64']),
            'content_4' => json_encode(['14','20','44','51','68']),
            'content_5' => json_encode(['2','21','40','47','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','25','41','52','64']),
            'content_2' => json_encode(['15','18','42','53','66']),
            'content_3' => json_encode(['9','20','38','51','68']),
            'content_4' => json_encode(['2','29','32','47','62']),
            'content_5' => json_encode(['4','19','44','56','72']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','18','34','56','61']),
            'content_2' => json_encode(['5','17','40','46','68']),
            'content_3' => json_encode(['3','29','45','47','71']),
            'content_4' => json_encode(['8','20','42','57','64']),
            'content_5' => json_encode(['14','24','32','48','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','17','42','50','69']),
            'content_2' => json_encode(['4','22','44','57','63']),
            'content_3' => json_encode(['15','19','40','49','74']),
            'content_4' => json_encode(['8','18','39','56','72']),
            'content_5' => json_encode(['9','24','45','47','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','19','34','52','74']),
            'content_2' => json_encode(['9','23','42','53','64']),
            'content_3' => json_encode(['3','20','31','50','69']),
            'content_4' => json_encode(['5','18','32','48','68']),
            'content_5' => json_encode(['2','17','39','46','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','23','38','53','61']),
            'content_2' => json_encode(['9','21','42','46','72']),
            'content_3' => json_encode(['2','18','31','52','71']),
            'content_4' => json_encode(['4','25','34','47','74']),
            'content_5' => json_encode(['3','29','32','51','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','23','34','51','66']),
            'content_2' => json_encode(['15','19','45','56','68']),
            'content_3' => json_encode(['8','22','32','46','64']),
            'content_4' => json_encode(['4','17','41','49','69']),
            'content_5' => json_encode(['9','29','42','47','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','22','40','53','61']),
            'content_2' => json_encode(['4','23','41','49','69']),
            'content_3' => json_encode(['7','25','32','50','74']),
            'content_4' => json_encode(['5','29','39','51','68']),
            'content_5' => json_encode(['8','17','42','48','72']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['9','24','31','50','63']),
            'content_2' => json_encode(['2','18','32','57','69']),
            'content_3' => json_encode(['5','19','44','48','72']),
            'content_4' => json_encode(['3','22','45','51','64']),
            'content_5' => json_encode(['7','25','34','53','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','29','40','48','74']),
            'content_2' => json_encode(['8','20','42','46','66']),
            'content_3' => json_encode(['15','23','39','49','69']),
            'content_4' => json_encode(['7','18','44','53','61']),
            'content_5' => json_encode(['2','19','38','57','64']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','22','44','48','63']),
            'content_2' => json_encode(['8','19','45','50','72']),
            'content_3' => json_encode(['14','21','41','46','74']),
            'content_4' => json_encode(['2','23','31','53','66']),
            'content_5' => json_encode(['4','18','40','51','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','29','31','49','71']),
            'content_2' => json_encode(['5','17','44','56','69']),
            'content_3' => json_encode(['4','18','32','53','64']),
            'content_4' => json_encode(['1','22','38','50','61']),
            'content_5' => json_encode(['14','19','39','48','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','17','44','48','64']),
            'content_2' => json_encode(['2','23','31','57','63']),
            'content_3' => json_encode(['15','22','34','56','62']),
            'content_4' => json_encode(['3','20','32','50','72']),
            'content_5' => json_encode(['14','24','38','46','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['9','25','44','46','66']),
            'content_2' => json_encode(['8','24','42','47','74']),
            'content_3' => json_encode(['5','17','34','51','63']),
            'content_4' => json_encode(['14','20','41','52','72']),
            'content_5' => json_encode(['7','23','31','56','64']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','29','38','47','69']),
            'content_2' => json_encode(['4','19','44','49','61']),
            'content_3' => json_encode(['1','24','45','56','63']),
            'content_4' => json_encode(['14','21','32','51','62']),
            'content_5' => json_encode(['15','20','42','52','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','18','45','46','68']),
            'content_2' => json_encode(['3','19','41','56','69']),
            'content_3' => json_encode(['1','29','34','57','66']),
            'content_4' => json_encode(['9','22','38','47','74']),
            'content_5' => json_encode(['8','24','32','52','72']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','18','32','46','72']),
            'content_2' => json_encode(['1','21','38','57','74']),
            'content_3' => json_encode(['14','23','31','52','69']),
            'content_4' => json_encode(['5','25','34','49','66']),
            'content_5' => json_encode(['2','22','41','47','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','23','45','50','69']),
            'content_2' => json_encode(['15','24','42','53','66']),
            'content_3' => json_encode(['3','21','40','52','64']),
            'content_4' => json_encode(['1','29','31','57','62']),
            'content_5' => json_encode(['9','25','39','51','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','19','38','46','72']),
            'content_2' => json_encode(['5','29','39','50','71']),
            'content_3' => json_encode(['7','20','32','57','66']),
            'content_4' => json_encode(['8','24','40','49','64']),
            'content_5' => json_encode(['4','22','42','52','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','24','38','53','72']),
            'content_2' => json_encode(['3','29','40','52','69']),
            'content_3' => json_encode(['9','20','45','56','71']),
            'content_4' => json_encode(['8','19','39','49','64']),
            'content_5' => json_encode(['7','17','32','50','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['7','25','40','46','71']),
            'content_2' => json_encode(['14','22','41','57','64']),
            'content_3' => json_encode(['4','21','44','47','68']),
            'content_4' => json_encode(['5','29','31','53','62']),
            'content_5' => json_encode(['15','8','39','50','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','17','34','57','62']),
            'content_2' => json_encode(['8','21','39','51','74']),
            'content_3' => json_encode(['14','23','41','56','72']),
            'content_4' => json_encode(['5','25','45','47','61']),
            'content_5' => json_encode(['15','19','31','49','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['7','17','31','56','74']),
            'content_2' => json_encode(['5','29','34','51','68']),
            'content_3' => json_encode(['9','22','38','52','62']),
            'content_4' => json_encode(['3','19','40','46','69']),
            'content_5' => json_encode(['4','25','44','47','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','20','34','49','66']),
            'content_2' => json_encode(['3','22','41','57','69']),
            'content_3' => json_encode(['2','18','38','51','61']),
            'content_4' => json_encode(['15','29','42','53','72']),
            'content_5' => json_encode(['14','21','44','52','74']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','22','44','51','71']),
            'content_2' => json_encode(['9','21','32','57','63']),
            'content_3' => json_encode(['8','20','45','46','64']),
            'content_4' => json_encode(['5','19','40','48','62']),
            'content_5' => json_encode(['2','29','42','52','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['7','20','34','47','71']),
            'content_2' => json_encode(['15','25','39','48','64']),
            'content_3' => json_encode(['2','19','32','50','68']),
            'content_4' => json_encode(['8','23','40','53','61']),
            'content_5' => json_encode(['1','24','42','46','72']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['9','20','39','53','71']),
            'content_2' => json_encode(['7','19','44','50','66']),
            'content_3' => json_encode(['1','22','40','51','61']),
            'content_4' => json_encode(['2','29','31','46','74']),
            'content_5' => json_encode(['8','17','42','57','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['7','20','40','46','66']),
            'content_2' => json_encode(['3','19','38','49','69']),
            'content_3' => json_encode(['15','29','31','52','74']),
            'content_4' => json_encode(['4','17','44','48','61']),
            'content_5' => json_encode(['2','21','41','53','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','21','42','53','69']),
            'content_2' => json_encode(['8','22','31','57','62']),
            'content_3' => json_encode(['9','17','32','50','63']),
            'content_4' => json_encode(['3','25','40','48','66']),
            'content_5' => json_encode(['4','23','39','51','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','18','39','47','63']),
            'content_2' => json_encode(['2','25','34','51','64']),
            'content_3' => json_encode(['8','24','45','52','61']),
            'content_4' => json_encode(['1','21','41','49','66']),
            'content_5' => json_encode(['9','17','38','46','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','20','45','48','64']),
            'content_2' => json_encode(['3','19','40','51','72']),
            'content_3' => json_encode(['5','18','39','46','66']),
            'content_4' => json_encode(['4','23','31','57','71']),
            'content_5' => json_encode(['1','22','38','52','74']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','19','42','52','64']),
            'content_2' => json_encode(['3','22','41','50','63']),
            'content_3' => json_encode(['5','20','32','48','62']),
            'content_4' => json_encode(['14','17','45','57','69']),
            'content_5' => json_encode(['4','29','34','51','74']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','29','38','47','62']),
            'content_2' => json_encode(['9','21','31','57','64']),
            'content_3' => json_encode(['4','22','40','56','71']),
            'content_4' => json_encode(['7','24','39','49','74']),
            'content_5' => json_encode(['3','17','44','48','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','19','42','51','68']),
            'content_2' => json_encode(['7','24','39','46','66']),
            'content_3' => json_encode(['4','18','45','49','63']),
            'content_4' => json_encode(['1','29','31','52','62']),
            'content_5' => json_encode(['3','23','41','56','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','18','34','52','74']),
            'content_2' => json_encode(['4','25','39','48','61']),
            'content_3' => json_encode(['2','23','41','50','64']),
            'content_4' => json_encode(['9','29','40','56','66']),
            'content_5' => json_encode(['14','19','38','46','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','23','45','50','62']),
            'content_2' => json_encode(['3','22','38','48','63']),
            'content_3' => json_encode(['1','24','39','53','72']),
            'content_4' => json_encode(['2','19','42','46','64']),
            'content_5' => json_encode(['15','25','40','57','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','23','34','52','74']),
            'content_2' => json_encode(['9','18','41','49','69']),
            'content_3' => json_encode(['7','22','45','57','66']),
            'content_4' => json_encode(['5','19','38','47','62']),
            'content_5' => json_encode(['8','29','31','53','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','24','32','48','69']),
            'content_2' => json_encode(['2','21','39','46','64']),
            'content_3' => json_encode(['4','19','40','50','62']),
            'content_4' => json_encode(['15','18','42','52','61']),
            'content_5' => json_encode(['1','23','34','53','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','23','40','51','71']),
            'content_2' => json_encode(['5','25','34','48','68']),
            'content_3' => json_encode(['14','21','44','49','69']),
            'content_4' => json_encode(['4','18','41','53','61']),
            'content_5' => json_encode(['15','22','42','56','64']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','22','38','48','74']),
            'content_2' => json_encode(['3','17','45','57','63']),
            'content_3' => json_encode(['14','29','34','47','68']),
            'content_4' => json_encode(['7','20','41','53','72']),
            'content_5' => json_encode(['5','21','40','50','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','17','39','57','66']),
            'content_2' => json_encode(['2','24','42','52','63']),
            'content_3' => json_encode(['9','21','34','47','74']),
            'content_4' => json_encode(['4','29','44','51','62']),
            'content_5' => json_encode(['3','20','38','48','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['9','22','31','48','66']),
            'content_2' => json_encode(['7','21','39','47','72']),
            'content_3' => json_encode(['14','25','38','53','64']),
            'content_4' => json_encode(['15','17','45','49','71']),
            'content_5' => json_encode(['4','20','41','46','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','22','41','57','64']),
            'content_2' => json_encode(['15','25','45','50','68']),
            'content_3' => json_encode(['5','20','39','52','72']),
            'content_4' => json_encode(['14','24','38','47','74']),
            'content_5' => json_encode(['7','17','31','51','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['9','18','39','47','63']),
            'content_2' => json_encode(['3','19','38','49','74']),
            'content_3' => json_encode(['8','20','40','56','61']),
            'content_4' => json_encode(['5','25','44','48','68']),
            'content_5' => json_encode(['1','29','34','57','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','22','41','49','68']),
            'content_2' => json_encode(['1','18','32','52','74']),
            'content_3' => json_encode(['4','25','38','51','61']),
            'content_4' => json_encode(['8','24','40','48','63']),
            'content_5' => json_encode(['3','20','31','56','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','19','41','56','71']),
            'content_2' => json_encode(['8','20','39','53','62']),
            'content_3' => json_encode(['9','21','32','57','72']),
            'content_4' => json_encode(['1','24','40','49','74']),
            'content_5' => json_encode(['4','18','42','50','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','22','32','47','69']),
            'content_2' => json_encode(['7','25','40','48','72']),
            'content_3' => json_encode(['2','17','31','53','64']),
            'content_4' => json_encode(['5','19','44','49','71']),
            'content_5' => json_encode(['1','18','39','50','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','25','44','56','69']),
            'content_2' => json_encode(['1','29','45','49','74']),
            'content_3' => json_encode(['7','21','41','51','62']),
            'content_4' => json_encode(['9','17','42','52','63']),
            'content_5' => json_encode(['5','24','34','57','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','21','45','49','61']),
            'content_2' => json_encode(['14','29','31','52','62']),
            'content_3' => json_encode(['15','20','44','46','66']),
            'content_4' => json_encode(['8','22','39','50','74']),
            'content_5' => json_encode(['2','17','42','53','72']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','24','38','52','62']),
            'content_2' => json_encode(['7','25','39','51','72']),
            'content_3' => json_encode(['15','29','42','48','61']),
            'content_4' => json_encode(['3','19','41','49','63']),
            'content_5' => json_encode(['2','20','45','46','74']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','29','32','56','61']),
            'content_2' => json_encode(['4','25','34','50','71']),
            'content_3' => json_encode(['9','22','40','46','63']),
            'content_4' => json_encode(['8','23','44','48','64']),
            'content_5' => json_encode(['3','20','39','47','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','17','32','51','61']),
            'content_2' => json_encode(['1','23','40','56','63']),
            'content_3' => json_encode(['4','18','31','47','62']),
            'content_4' => json_encode(['8','19','42','46','74']),
            'content_5' => json_encode(['3','22','41','48','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','19','32','53','64']),
            'content_2' => json_encode(['2','18','38','49','61']),
            'content_3' => json_encode(['8','29','42','47','66']),
            'content_4' => json_encode(['5','22','45','50','72']),
            'content_5' => json_encode(['3','25','34','57','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','20','39','56','63']),
            'content_2' => json_encode(['9','23','42','53','62']),
            'content_3' => json_encode(['4','29','38','50','66']),
            'content_4' => json_encode(['1','19','40','48','72']),
            'content_5' => json_encode(['7','22','32','47','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','21','41','48','69']),
            'content_2' => json_encode(['7','24','39','53','72']),
            'content_3' => json_encode(['14','25','40','57','74']),
            'content_4' => json_encode(['2','19','42','49','66']),
            'content_5' => json_encode(['9','22','31','46','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','18','31','56','64']),
            'content_2' => json_encode(['4','20','34','49','69']),
            'content_3' => json_encode(['9','29','45','53','71']),
            'content_4' => json_encode(['14','23','39','50','63']),
            'content_5' => json_encode(['8','22','40','51','72']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','20','42','47','68']),
            'content_2' => json_encode(['14','19','44','49','69']),
            'content_3' => json_encode(['8','21','32','51','62']),
            'content_4' => json_encode(['9','22','40','57','71']),
            'content_5' => json_encode(['7','17','38','53','74']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','18','42','56','68']),
            'content_2' => json_encode(['15','23','32','52','64']),
            'content_3' => json_encode(['9','20','38','53','72']),
            'content_4' => json_encode(['3','21','41','51','74']),
            'content_5' => json_encode(['2','22','34','57','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','18','32','52','72']),
            'content_2' => json_encode(['15','24','34','46','66']),
            'content_3' => json_encode(['3','17','45','47','71']),
            'content_4' => json_encode(['5','22','39','56','61']),
            'content_5' => json_encode(['8','25','40','53','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','24','45','51','69']),
            'content_2' => json_encode(['4','17','40','56','72']),
            'content_3' => json_encode(['15','19','41','57','61']),
            'content_4' => json_encode(['9','18','42','52','63']),
            'content_5' => json_encode(['3','20','32','46','64']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','18','32','52','61']),
            'content_2' => json_encode(['3','22','41','49','63']),
            'content_3' => json_encode(['4','20','31','46','71']),
            'content_4' => json_encode(['1','19','39','47','72']),
            'content_5' => json_encode(['8','24','44','50','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','19','32','57','69']),
            'content_2' => json_encode(['9','23','42','47','62']),
            'content_3' => json_encode(['2','21','31','52','71']),
            'content_4' => json_encode(['7','20','41','46','61']),
            'content_5' => json_encode(['15','24','44','50','74']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['7','23','32','51','74']),
            'content_2' => json_encode(['2','24','42','46','66']),
            'content_3' => json_encode(['15','19','41','53','72']),
            'content_4' => json_encode(['1','21','38','48','63']),
            'content_5' => json_encode(['4','29','34','47','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','17','38','57','69']),
            'content_2' => json_encode(['4','29','34','48','72']),
            'content_3' => json_encode(['7','25','31','46','63']),
            'content_4' => json_encode(['15','18','40','51','62']),
            'content_5' => json_encode(['14','23','42','49','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','24','40','57','71']),
            'content_2' => json_encode(['1','19','41','49','61']),
            'content_3' => json_encode(['7','17','44','48','64']),
            'content_4' => json_encode(['14','25','38','53','62']),
            'content_5' => json_encode(['9','21','32','52','72']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','20','31','53','66']),
            'content_2' => json_encode(['9','21','42','51','64']),
            'content_3' => json_encode(['15','22','39','56','69']),
            'content_4' => json_encode(['2','18','45','48','71']),
            'content_5' => json_encode(['5','23','34','47','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','23','39','57','71']),
            'content_2' => json_encode(['5','24','34','48','62']),
            'content_3' => json_encode(['9','22','38','46','63']),
            'content_4' => json_encode(['4','20','32','47','72']),
            'content_5' => json_encode(['8','18','31','52','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['9','20','39','48','61']),
            'content_2' => json_encode(['4','24','40','50','66']),
            'content_3' => json_encode(['3','29','42','47','74']),
            'content_4' => json_encode(['7','22','44','57','64']),
            'content_5' => json_encode(['15','23','41','52','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','22','39','57','63']),
            'content_2' => json_encode(['9','23','38','49','69']),
            'content_3' => json_encode(['15','29','34','56','64']),
            'content_4' => json_encode(['1','24','42','46','68']),
            'content_5' => json_encode(['5','18','32','53','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','18','41','47','71']),
            'content_2' => json_encode(['2','21','42','57','74']),
            'content_3' => json_encode(['4','17','45','51','63']),
            'content_4' => json_encode(['1','19','44','53','64']),
            'content_5' => json_encode(['9','20','40','46','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','22','45','53','68']),
            'content_2' => json_encode(['7','24','34','46','72']),
            'content_3' => json_encode(['1','18','44','56','61']),
            'content_4' => json_encode(['2','17','42','49','74']),
            'content_5' => json_encode(['3','20','40','52','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['9','29','44','47','71']),
            'content_2' => json_encode(['3','20','34','48','66']),
            'content_3' => json_encode(['1','17','39','57','62']),
            'content_4' => json_encode(['14','23','42','51','68']),
            'content_5' => json_encode(['2','25','31','46','64']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','21','41','49','62']),
            'content_2' => json_encode(['9','19','44','57','63']),
            'content_3' => json_encode(['14','23','31','52','69']),
            'content_4' => json_encode(['2','22','45','48','68']),
            'content_5' => json_encode(['15','24','34','50','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','19','41','46','63']),
            'content_2' => json_encode(['14','18','42','52','69']),
            'content_3' => json_encode(['5','24','44','57','64']),
            'content_4' => json_encode(['15','23','38','53','61']),
            'content_5' => json_encode(['2','17','31','50','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','29','38','56','62']),
            'content_2' => json_encode(['15','24','45','48','72']),
            'content_3' => json_encode(['7','25','42','52','68']),
            'content_4' => json_encode(['8','22','32','46','71']),
            'content_5' => json_encode(['1','23','41','50','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','23','42','57','68']),
            'content_2' => json_encode(['3','17','44','56','66']),
            'content_3' => json_encode(['2','25','45','48','72']),
            'content_4' => json_encode(['9','22','31','52','61']),
            'content_5' => json_encode(['15','48','40','47','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','19','40','56','66']),
            'content_2' => json_encode(['3','23','31','57','74']),
            'content_3' => json_encode(['7','24','387','53','71']),
            'content_4' => json_encode(['4','29','39','52','72']),
            'content_5' => json_encode(['1','22','34','47','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','24','38','50','72']),
            'content_2' => json_encode(['2','22','42','47','74']),
            'content_3' => json_encode(['14','29','41','49','66']),
            'content_4' => json_encode(['7','20','32','51','51']),
            'content_5' => json_encode(['1','23','34','53','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','19','40','52','61']),
            'content_2' => json_encode(['15','24','42','51','64']),
            'content_3' => json_encode(['9','17','38','57','74']),
            'content_4' => json_encode(['1','18','41','47','63']),
            'content_5' => json_encode(['7','25','31','56','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','21','34','48','72']),
            'content_2' => json_encode(['3','19','44','56','68']),
            'content_3' => json_encode(['15','8','38','53','71']),
            'content_4' => json_encode(['8','23','41','46','63']),
            'content_5' => json_encode(['4','17','31','51','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['7','23','39','50','66']),
            'content_2' => json_encode(['1','19','41','57','61']),
            'content_3' => json_encode(['8','25','45','51','74']),
            'content_4' => json_encode(['3','24','38','53','64']),
            'content_5' => json_encode(['5','22','44','48','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','21','40','49','61']),
            'content_2' => json_encode(['14','24','39','53','63']),
            'content_3' => json_encode(['9','19','32','48','72']),
            'content_4' => json_encode(['1','18','34','51','62']),
            'content_5' => json_encode(['8','29','41','56','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','17','31','48','66']),
            'content_2' => json_encode(['2','24','39','50','64']),
            'content_3' => json_encode(['4','29','44','51','61']),
            'content_4' => json_encode(['8','25','32','52','72']),
            'content_5' => json_encode(['15','19','45','46','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','21','31','47','66']),
            'content_2' => json_encode(['4','20','40','50','68']),
            'content_3' => json_encode(['15','19','41','52','69']),
            'content_4' => json_encode(['7','29','45','49','62']),
            'content_5' => json_encode(['14','25','34','48','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','20','41','48','68']),
            'content_2' => json_encode(['14','22','38','57','69']),
            'content_3' => json_encode(['9','17','32','50','63']),
            'content_4' => json_encode(['1','21','42','51','66']),
            'content_5' => json_encode(['8','19','44','52','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['9','29','39','49','66']),
            'content_2' => json_encode(['8','21','41','52','62']),
            'content_3' => json_encode(['7','25','42','57','61']),
            'content_4' => json_encode(['3','20','34','47','63']),
            'content_5' => json_encode(['4','22','40','48','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','20','42','49','63']),
            'content_2' => json_encode(['7','24','34','51','64']),
            'content_3' => json_encode(['5','22','32','46','72']),
            'content_4' => json_encode(['1','17','41','56','61']),
            'content_5' => json_encode(['2','18','31','50','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','25','39','56','64']),
            'content_2' => json_encode(['3','17','44','46','68']),
            'content_3' => json_encode(['5','20','32','50','63']),
            'content_4' => json_encode(['7','22','42','47','72']),
            'content_5' => json_encode(['2','18','45','57','74']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','29','45','46','69']),
            'content_2' => json_encode(['3','22','38','57','74']),
            'content_3' => json_encode(['7','19','41','56','71']),
            'content_4' => json_encode(['15','23','34','50','66']),
            'content_5' => json_encode(['14','17','32','53','64']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','25','39','52','68']),
            'content_2' => json_encode(['14','23','41','47','63']),
            'content_3' => json_encode(['5','22','34','56','69']),
            'content_4' => json_encode(['8','29','44','53','71']),
            'content_5' => json_encode(['3','24','32','51','72']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','25','32','47','61']),
            'content_2' => json_encode(['7','24','42','51','72']),
            'content_3' => json_encode(['2','23','40','50','62']),
            'content_4' => json_encode(['15','19','44','46','66']),
            'content_5' => json_encode(['4','20','41','49','64']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','19','38','50','64']),
            'content_2' => json_encode(['3','29','40','49','68']),
            'content_3' => json_encode(['1','21','39','51','62']),
            'content_4' => json_encode(['9','23','32','57','61']),
            'content_5' => json_encode(['14','17','34','48','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','25','32','51','61']),
            'content_2' => json_encode(['14','23','44','57','68']),
            'content_3' => json_encode(['15','22','34','52','74']),
            'content_4' => json_encode(['4','17','41','56','62']),
            'content_5' => json_encode(['5','20','39','50','64']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','23','42','53','62']),
            'content_2' => json_encode(['8','18','38','51','64']),
            'content_3' => json_encode(['3','17','45','50','74']),
            'content_4' => json_encode(['2','25','40','47','68']),
            'content_5' => json_encode(['7','20','34','49','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','25','34','50','66']),
            'content_2' => json_encode(['15','24','39','46','72']),
            'content_3' => json_encode(['14','21','40','57','69']),
            'content_4' => json_encode(['3','22','31','47','63']),
            'content_5' => json_encode(['4','19','38','51','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['7','17','32','53','62']),
            'content_2' => json_encode(['3','25','45','56','68']),
            'content_3' => json_encode(['9','29','34','47','66']),
            'content_4' => json_encode(['2','19','40','46','69']),
            'content_5' => json_encode(['8','22','39','52','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['9','19','31','51','74']),
            'content_2' => json_encode(['14','22','41','52','61']),
            'content_3' => json_encode(['2','21','42','47','69']),
            'content_4' => json_encode(['3','24','45','53','64']),
            'content_5' => json_encode(['8','20','38','46','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','17','32','48','72']),
            'content_2' => json_encode(['14','23','38','51','63']),
            'content_3' => json_encode(['1','25','44','53','64']),
            'content_4' => json_encode(['3','29','31','46','62']),
            'content_5' => json_encode(['5','22','40','50','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['7','24','44','57','63']),
            'content_2' => json_encode(['2','25','34','53','66']),
            'content_3' => json_encode(['5','20','39','49','68']),
            'content_4' => json_encode(['9','23','31','50','64']),
            'content_5' => json_encode(['14','18','42','46','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['7','22','34','49','74']),
            'content_2' => json_encode(['3','20','39','50','68']),
            'content_3' => json_encode(['2','25','40','56','71']),
            'content_4' => json_encode(['15','19','42','48','62']),
            'content_5' => json_encode(['5','18','44','47','64']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','21','44','53','64']),
            'content_2' => json_encode(['9','23','41','52','69']),
            'content_3' => json_encode(['3','20','31','46','71']),
            'content_4' => json_encode(['4','22','32','51','62']),
            'content_5' => json_encode(['7','18','39','50','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','25','31','46','63']),
            'content_2' => json_encode(['2','21','38','52','64']),
            'content_3' => json_encode(['9','23','41','56','68']),
            'content_4' => json_encode(['5','20','42','57','74']),
            'content_5' => json_encode(['8','17','32','47','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','21','38','48','68']),
            'content_2' => json_encode(['5','25','45','46','62']),
            'content_3' => json_encode(['15','19','32','53','74']),
            'content_4' => json_encode(['1','20','41','56','61']),
            'content_5' => json_encode(['14','17','44','47','64']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','18','41','46','63']),
            'content_2' => json_encode(['3','17','45','50','68']),
            'content_3' => json_encode(['7','24','38','51','69']),
            'content_4' => json_encode(['4','29','32','47','66']),
            'content_5' => json_encode(['14','19','42','56','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','20','42','47','72']),
            'content_2' => json_encode(['3','29','40','52','63']),
            'content_3' => json_encode(['15','25','45','50','66']),
            'content_4' => json_encode(['7','17','34','48','64']),
            'content_5' => json_encode(['5','21','44','57','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','23','41','56','64']),
            'content_2' => json_encode(['2','21','31','47','63']),
            'content_3' => json_encode(['15','19','32','48','71']),
            'content_4' => json_encode(['7','22','34','52','68']),
            'content_5' => json_encode(['5','29','44','49','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','18','38','49','72']),
            'content_2' => json_encode(['7','25','42','53','68']),
            'content_3' => json_encode(['9','29','45','51','63']),
            'content_4' => json_encode(['15','19','40','47','66']),
            'content_5' => json_encode(['2','23','44','48','74']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['8','24','42','52','69']),
            'content_2' => json_encode(['1','19','34','46','68']),
            'content_3' => json_encode(['4','23','41','57','74']),
            'content_4' => json_encode(['14','29','44','48','71']),
            'content_5' => json_encode(['7','21','39','50','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','23','38','52','72']),
            'content_2' => json_encode(['1','18','40','57','61']),
            'content_3' => json_encode(['2','29','42','50','63']),
            'content_4' => json_encode(['4','20','41','56','74']),
            'content_5' => json_encode(['9','22','44','53','71']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','17','38','57','61']),
            'content_2' => json_encode(['8','18','31','53','62']),
            'content_3' => json_encode(['7','20','39','51','69']),
            'content_4' => json_encode(['9','24','44','47','72']),
            'content_5' => json_encode(['14','23','32','48','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['7','23','31','51','74']),
            'content_2' => json_encode(['15','25','39','48','72']),
            'content_3' => json_encode(['4','18','34','56','71']),
            'content_4' => json_encode(['3','29','38','52','61']),
            'content_5' => json_encode(['2','20','42','57','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','24','38','57','61']),
            'content_2' => json_encode(['7','20','44','56','68']),
            'content_3' => json_encode(['3','25','42','49','62']),
            'content_4' => json_encode(['14','17','34','47','69']),
            'content_5' => json_encode(['8','23','31','46','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','24','31','57','71']),
            'content_2' => json_encode(['14','29','40','52','69']),
            'content_3' => json_encode(['4','22','41','49','61']),
            'content_4' => json_encode(['7','21','42','56','62']),
            'content_5' => json_encode(['5','18','31','46','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','21','40','57','74']),
            'content_2' => json_encode(['2','22','31','52','62']),
            'content_3' => json_encode(['4','18','34','56','63']),
            'content_4' => json_encode(['3','17','41','50','64']),
            'content_5' => json_encode(['9','25','45','53','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['9','22','39','50','71']),
            'content_2' => json_encode(['15','25','45','53','64']),
            'content_3' => json_encode(['7','21','32','49','62']),
            'content_4' => json_encode(['14','18','38','48','74']),
            'content_5' => json_encode(['4','19','40','52','68']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['1','20','31','48','71']),
            'content_2' => json_encode(['7','17','34','56','68']),
            'content_3' => json_encode(['14','21','39','46','64']),
            'content_4' => json_encode(['2','19','32','50','63']),
            'content_5' => json_encode(['4','29','41','57','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','17','42','49','63']),
            'content_2' => json_encode(['3','29','41','52','74']),
            'content_3' => json_encode(['8','18','44','47','72']),
            'content_4' => json_encode(['2','22','38','51','64']),
            'content_5' => json_encode(['7','24','40','53','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','18','40','47','71']),
            'content_2' => json_encode(['8','24','31','53','64']),
            'content_3' => json_encode(['1','29','44','50','62']),
            'content_4' => json_encode(['4','25','42','57','69']),
            'content_5' => json_encode(['14','23','38','49','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','29','42','47','64']),
            'content_2' => json_encode(['2','25','31','48','66']),
            'content_3' => json_encode(['14','20','45','52','69']),
            'content_4' => json_encode(['7','21','44','46','71']),
            'content_5' => json_encode(['1','18','40','56','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','19','44','47','71']),
            'content_2' => json_encode(['15','29','40','50','68']),
            'content_3' => json_encode(['9','18','45','53','72']),
            'content_4' => json_encode(['8','17','31','52','62']),
            'content_5' => json_encode(['14','24','38','57','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','18','38','56','69']),
            'content_2' => json_encode(['1','22','41','52','71']),
            'content_3' => json_encode(['8','25','39','51','74']),
            'content_4' => json_encode(['5','17','34','45','63']),
            'content_5' => json_encode(['15','29','42','48','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','19','44','51','63']),
            'content_2' => json_encode(['9','21','31','53','62']),
            'content_3' => json_encode(['14','17','38','46','72']),
            'content_4' => json_encode(['8','22','39','52','68']),
            'content_5' => json_encode(['1','20','42','48','61']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','29','45','46','69']),
            'content_2' => json_encode(['7','20','42','53','64']),
            'content_3' => json_encode(['3','17','39','47','71']),
            'content_4' => json_encode(['9','19','40','52','74']),
            'content_5' => json_encode(['15','22','32','49','62']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['4','23','41','56','68']),
            'content_2' => json_encode(['15','29','34','46','71']),
            'content_3' => json_encode(['2','19','40','49','61']),
            'content_4' => json_encode(['5','22','44','51','64']),
            'content_5' => json_encode(['8','18','31','53','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','25','34','56','62']),
            'content_2' => json_encode(['14','19','38','52','61']),
            'content_3' => json_encode(['1','24','31','46','71']),
            'content_4' => json_encode(['5','18','40','50','63']),
            'content_5' => json_encode(['3','22','39','49','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['14','24','45','50','72']),
            'content_2' => json_encode(['1','18','31','51','64']),
            'content_3' => json_encode(['8','21','32','52','61']),
            'content_4' => json_encode(['3','23','44','57','62']),
            'content_5' => json_encode(['2','17','40','56','66']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['2','19','40','52','71']),
            'content_2' => json_encode(['7','20','39','46','72']),
            'content_3' => json_encode(['5','22','32','51','64']),
            'content_4' => json_encode(['4','29','44','49','61']),
            'content_5' => json_encode(['1','18','38','48','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['5','22','34','48','72']),
            'content_2' => json_encode(['15','20','40','49','71']),
            'content_3' => json_encode(['7','21','31','50','63']),
            'content_4' => json_encode(['3','25','45','47','61']),
            'content_5' => json_encode(['4','17','44','53','69']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['15','23','31','50','66']),
            'content_2' => json_encode(['9','22','44','52','69']),
            'content_3' => json_encode(['4','19','45','56','68']),
            'content_4' => json_encode(['7','21','42','57','74']),
            'content_5' => json_encode(['2','17','40','53','63']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['7','22','34','48','61']),
            'content_2' => json_encode(['9','18','31','52','74']),
            'content_3' => json_encode(['15','29','39','50','71']),
            'content_4' => json_encode(['4','17','38','56','69']),
            'content_5' => json_encode(['3','21','32','49','72']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['3','17','41','53','64']),
            'content_2' => json_encode(['8','20','34','46','72']),
            'content_3' => json_encode(['9','18','38','50','63']),
            'content_4' => json_encode(['14','23','40','56','62']),
            'content_5' => json_encode(['2','25','39','49','74']),
            'serial' => ''
        ]);
        
        DB::table('cartons')->insert([
            'content_1' => json_encode(['7','21','40','47','66']),
            'content_2' => json_encode(['5','17','34','56','71']),
            'content_3' => json_encode(['4','23','32','51','74']),
            'content_4' => json_encode(['14','20','31','50','63']),
            'content_5' => json_encode(['2','24','44','46','64']),
            'serial' => ''
        ]);
        
        
        
        


    }
}
