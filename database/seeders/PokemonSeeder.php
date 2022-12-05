<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('monsters')->insert([
            ['nom'=> 'Pakichu',
            'type_id' => 1,
            'level'=> 32,
            ],
            ['nom'=> 'Salemèche',
            'type_id' => 2,
            'level'=> 60,
            ],
            ['nom'=> 'Trucbizzare',
            'type_id' => 3,
            'level'=> 50,
            ],
            ['nom'=> 'Psychopatte',
            'type_id' => 4,
            'level'=> 20,
            ],
        ]);
    }
}
