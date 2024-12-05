<?php

namespace App\Services;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class HotelService
{
    public function validateHotel(Request $request, $id = null)
    {
        $rules = [
            'hot_name' => 'required|string|max:150',
            'hot_quantity_rooms' => 'required|integer',
            'hot_state' => 'sometimes|integer',
            'cit_id' => 'required|exists:cities,cit_id',
            'hot_address' => 'required|string|max:150',
            'hot_nit' => 'required|string|max:20|unique:hotels,hot_nit,' . ($id ? $id : 'NULL') . ',hot_id',
        ];

        $messages = [
            'hot_nit.unique' => 'The provided NIT is already used. Please use a unique NIT.',
        ];

        return $request->validate($rules, $messages);
    }

    public function validateHotelExists($hotelId)
    {
        $hotel = Hotel::find($hotelId);
        // Log::debug($hotel);
        if (!$hotel || $hotel->hot_state != 1) {
            throw new ModelNotFoundException('Hotel not found.');
        }

        return $hotel;
    }

    public function createHotel(array $validatedData)
    {
        return Hotel::create($validatedData);
    }

    public function updateHotel(Hotel $hotel, array $validatedData)
    {
        $hotel->update($validatedData);
        return $hotel;
    }

    public function deleteHotel(Hotel $hotel)
    {
        $hotel->update(['hot_state' => 0]);
    }
}
