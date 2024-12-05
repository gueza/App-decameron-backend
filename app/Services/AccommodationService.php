<?php

namespace App\Services;

use App\Models\RoomTypeAccommodation;

class AccommodationService
{

    public function getAccommodationsByRoomType(int $roomTypeId)
    {
        
        $roomTypeAccommodations = RoomTypeAccommodation::where('rty_id', $roomTypeId)
            ->with('accommodation')
            ->get();

        return $roomTypeAccommodations->pluck('accommodation');
    }
}
