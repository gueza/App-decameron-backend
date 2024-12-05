<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccommodationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('accommodations')->insert([
            ['acc_id' => 1, 'acc_name' => 'Sencilla', 'acc_state' => 1],
            ['acc_id' => 2, 'acc_name' => 'Doble', 'acc_state' => 1],
            ['acc_id' => 3, 'acc_name' => 'Triple', 'acc_state' => 1],
            ['acc_id' => 4, 'acc_name' => 'Cuádruple', 'acc_state' => 1],
        ]);
    }
}
