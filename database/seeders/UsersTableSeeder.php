<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Nguyên',
            'email' =>'nguyen@email.com',
            'password' => bcrypt('123123'),
            'level' => 0,
            'avatar' => 'images/nguyen-avatar.jpg',
            'point' => 0,
        ]);

    }
}
