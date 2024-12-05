<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('room_types')->insert([
            ['rty_id' => 1, 'rty_name' => 'Estándar', 'rty_state' => 1],
            ['rty_id' => 2, 'rty_name' => 'Junior', 'rty_state' => 1],
            ['rty_id' => 3, 'rty_name' => 'Suite', 'rty_state' => 1],
        ]);
    }
}
