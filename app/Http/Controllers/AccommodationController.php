<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Services\AccommodationService;
use App\Services\ExceptionHandlerService;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    protected $accommodationService;
    private $exceptionHandler;

    public function __construct(AccommodationService $accommodationService, ExceptionHandlerService $exceptionHandler)
    {
        $this->accommodationService = $accommodationService;
        $this->exceptionHandler = $exceptionHandler;
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
            return $this->exceptionHandler->handle($e, 'Error listing accommodations');
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
            return $this->exceptionHandler->handle($e, 'Error listing accommodations by room type');
        }
    }
}
