<?php

namespace App\Services;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Support\Facades\Validator;
use App\Services\AccommodationService;
use App\Services\HotelService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RoomService
{
    protected $accommodationService;
    protected $hotelService;

    public function __construct(AccommodationService $accommodationService, HotelService $hotelService)
    {
        $this->accommodationService = $accommodationService;
        $this->hotelService = $hotelService;
    }

    public function getRoomsByHotel($hot_id)
    {
        $this->validateHotelExists($hot_id);

        return Room::where('hot_id', $hot_id)
            ->with(['accommodation', 'roomType'])
            ->where('roo_state', 1)
            ->get();
    }

    public function getActiveRooms()
    {
        return Room::with(['hotels', 'accommodation', 'roomType'])
            ->where('roo_state', 1)
            ->get();
    }

    public function createRoom(array $data)
    {

        $validator = Validator::make($data, [
            'hot_id' => 'required|exists:hotels,hot_id',
            'acc_id' => 'required|exists:accommodations,acc_id',
            'rty_id' => 'required|exists:room_types,rty_id',
            'roo_quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException(json_encode($validator->errors()));
        }

        $this->validateAccommodationForRoomType($data['rty_id'], $data['acc_id']);

        $hotel = Hotel::findOrFail($data['hot_id']);
        $this->validateRoomCapacity($hotel, $data['roo_quantity']);

        $this->validateRoomCombination($data);

        return Room::create($data);
    }

    public function updateRoom($id, array $data)
    {
        $room = Room::findOrFail($id);

        $validator = Validator::make($data, [
            'roo_quantity' => 'sometimes|integer|min:1',
            'hot_id' => 'sometimes|exists:hotels,hot_id',
            'acc_id' => 'sometimes|exists:accommodations,acc_id',
            'rty_id' => 'sometimes|exists:room_types,rty_id',
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException(json_encode($validator->errors()));
        }

        if (isset($data['roo_quantity'])) {
            $hotel = Hotel::findOrFail($room->hot_id);
            $this->validateRoomCapacity($hotel, $data['roo_quantity'], $room->roo_id);
        }

        if (isset($data['rty_id']) && isset($data['acc_id'])) {
            $this->validateAccommodationForRoomType($data['rty_id'], $data['acc_id']);
        }

        $this->validateRoomCombination($data, $id);

        $room->update($data);
        return $room;
    }

    public function deleteRoom($id)
    {
        $room = Room::findOrFail($id);
        $room->update(['roo_state' => 0]);
    }

    private function validateHotelExists($hotelId)
    {
        $hotel = $this->hotelService->validateHotelExists($hotelId);
        if (!$hotel || $hotel->hot_state != 1) {
            throw new ModelNotFoundException('Hotel not found.');
        }

        return $hotel;
    }

    private function validateAccommodationForRoomType(int $roomTypeId, int $accommodationId)
    {

        $validAccommodations = $this->accommodationService->getAccommodationsByRoomType($roomTypeId);
        $validAccommodationIds = $validAccommodations->pluck('acc_id')->toArray();

        if (!in_array($accommodationId, $validAccommodationIds)) {
            throw new \InvalidArgumentException('The selected accommodation is not valid for this room type.');
        }
    }

    private function validateRoomCapacity(Hotel $hotel, $newQuantity, $excludedRoomId = null)
    {
        $currentRooms = Room::where('hot_id', $hotel->hot_id)
            ->when($excludedRoomId, function ($query) use ($excludedRoomId) {
                $query->where('roo_id', '!=', $excludedRoomId);
            })
            ->sum('roo_quantity');

        if (($currentRooms + $newQuantity) > $hotel->hot_quantity_rooms) {
            throw new \OverflowException('The total number of rooms exceeds the hotel capacity.');
        }
    }

    private function validateRoomCombination(array $data, int $roomId = null)
    {
        $exists = Room::where('hot_id', $data['hot_id'])
            ->where('acc_id', $data['acc_id'])
            ->where('rty_id', $data['rty_id'])
            ->where('roo_state', 1);
            // ->exists();

        if ($roomId && Room::where('roo_id', $roomId)->exists()) {
            $exists->where('roo_id', '!=', $roomId);
        }

        $exists = $exists->exists();

        if ($exists) {
            throw new \InvalidArgumentException('A room with this combination already exists.');
        }
    }
}
