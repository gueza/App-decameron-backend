<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cities')->insert([
            ['cit_id' => 1, 'cit_name' => 'Bogotá', 'cit_state' => 1],
            ['cit_id' => 2, 'cit_name' => 'Medellín', 'cit_state' => 1],
        ]);
    }
}
