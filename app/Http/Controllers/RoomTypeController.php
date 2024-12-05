<?php

namespace App\Http\Controllers;

use App\Models\RoomType;

class RoomTypeController extends Controller
{
    public function list()
    {
        try {
            $roomTypes = RoomType::where('rty_state', 1)->get();

            return response()->json([
                'message' => 'Room types list successfully.',
                'state' => true,
                'data' => $roomTypes,
            ], 200);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Error listing room types');
        }
    }

    private function handleException(\Exception $e, $defaultMessage)
    {
        return response()->json([
            'message' => $defaultMessage . ': ' . $e->getMessage(),
            'state' => false,
        ], 500);
    }
}
