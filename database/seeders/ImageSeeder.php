<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            ['src'=> 'img1.jpg',
            'monster_id'=> 1],
            ['src'=> 'img2.jpg',
        'monster_id'=> 2],
            ['src'=> 'img3.jpg',
            'monster_id'=> 3],
            ['src'=> 'img4.jpg',
            'monster_id'=> 3],
        ]);
    }
}
