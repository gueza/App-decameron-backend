<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Services\AccommodationService;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    protected $accommodationService;

    public function __construct(AccommodationService $accommodationService)
    {
        $this->accommodationService = $accommodationService;
    }

    public function list()
    {
        try {
            $accommodations = Accommodation::where('acc_state', 1)->get();

            return response()->json([
                'message' => 'Accommodations list retrieved successfully.',
                'state' => true,
                'data' => $accommodations,
            ], 200);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Error listing accommodations');
        }
    }

    public function getAccommodationsByRoomType(Request $request)
    {
        try {
            
            $validated = $request->validate([
                'rty_id' => 'required|exists:room_types,rty_id',
            ]);

            $accommodations = $this->accommodationService->getAccommodationsByRoomType($validated['rty_id']);

            return response()->json([
                'message' => 'Accommodations retrieved successfully by room type.',
                'state' => true,
                'data' => $accommodations,
            ], 200);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Error listing accommodations by room type');
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
