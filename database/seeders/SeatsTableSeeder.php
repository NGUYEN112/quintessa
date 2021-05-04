<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0 ; $i <10 ;$i++) {
            DB::table('seats')->insert([
                'row' => 'A',
                'number' => $i+1,
                'room_id' => 2,
            ]);
        }

        for($j = 0 ; $j <10 ;$j++) {
            DB::table('seats')->insert([
                'row' => 'B',
                'number' => $j+1,
                'room_id' => 2,
            ]);
        }

        for($k = 0 ; $k <10 ;$k++) {
            DB::table('seats')->insert([
                'row' => 'C',
                'number' => $k+1,
                'room_id' => 2,
            ]);
        }

        for($l = 0 ; $l <10 ;$l++) {
            DB::table('seats')->insert([
                'row' => 'D',
                'number' => $l+1,
                'room_id' => 2,
            ]);
        }
    }
}
