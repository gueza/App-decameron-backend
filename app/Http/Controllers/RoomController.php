<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoomService;

class RoomController extends Controller
{
    private $roomService;

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function getRoomsByHotel(Request $request)
    {
        try {
            $validated = $request->validate([
                'hot_id' => 'required|exists:hotels,hot_id',
            ]);

            $rooms = $this->roomService->getRoomsByHotel($validated['hot_id']);
            $totalQuantity = 0;

            if (!$rooms->isEmpty()) {
                $totalQuantity = $rooms->sum('roo_quantity');
            }

            return response()->json([
                'message' => 'Rooms retrieved successfully.',
                'state' => true,
                'totalQuantity' => $totalQuantity,
                'data' => $rooms,
            ], 200);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Error retrieving rooms');
        }
    }

    public function list()
    {
        try {
            $rooms = $this->roomService->getActiveRooms();
            return response()->json([
                'message' => 'Rooms list successfully.',
                'state' => true,
                'data' => $rooms
            ], 200);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    public function store(Request $request)
    {
        try {
            $room = $this->roomService->createRoom($request->all());
            return response()->json([
                'message' => 'Room created successfully.',
                'state' => true,
                'data' => $room
            ], 201);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $room = $this->roomService->updateRoom($id, $request->all());
            return response()->json([
                'message' => 'Room updated successfully.',
                'state' => true,
                'data' => $room
            ], 200);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    public function delete($id)
    {
        try {
            $this->roomService->deleteRoom($id);
            return response()->json([
                'message' => 'Room deleted successfully.',
                'state' => true
            ], 200);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    private function handleException(\Exception $e)
    {
        return response()->json([
            'message' => 'An error occurred: ' . $e->getMessage(),
            'state' => false
        ], 500);
    }
}
