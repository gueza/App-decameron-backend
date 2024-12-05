<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RoomType;
use App\Models\Accommodation;
use Illuminate\Support\Facades\DB;

class RoomTypesAccommodationSeeder extends Seeder
{
    public function run(): void
    {

        $roomTypeCombinations = [
            1 => [1, 2], // Estándar -> Sencilla, Doble
            2 => [3, 4], // Junior -> Triple, Cuádruple
            3 => [1, 2, 3], // Suite -> Sencilla, Doble, Triple
        ];

        foreach ($roomTypeCombinations as $rty_id => $acc_ids) {
            foreach ($acc_ids as $acc_id) {
                if (RoomType::find($rty_id) && Accommodation::find($acc_id)) {
                    DB::table('room_type_accommodation')->insert([
                        'rty_id' => $rty_id,
                        'acc_id' => $acc_id,
                        'rta_state' => 1
                    ]);
                }
            }
        }
    }
}
