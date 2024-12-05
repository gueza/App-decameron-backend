<?php
namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Services\HotelService;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class HotelController extends Controller
{
    protected $hotelService;

    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }

    public function list()
    {
        try {
            $hotels = Hotel::with('city')->where('hot_state', 1)->get();

            return response()->json([
                'message' => 'Hotels list successfully.',
                'state' => true,
                'data' => $hotels,
            ], 200);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Error listing hotels');
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->hotelService->validateHotel($request);

            $hotel = $this->hotelService->createHotel($validated);

            return response()->json([
                'message' => 'Hotel created successfully.',
                'state' => true,
                'data' => $hotel,
            ], 201);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Error creating hotel');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $hotel = Hotel::findOrFail($id);
    
            $validated = $this->hotelService->validateHotel($request, $id);
    
            $hotel = $this->hotelService->updateHotel($hotel, $validated);
    
            return response()->json([
                'message' => 'Hotel updated successfully.',
                'state' => true,
                'data' => $hotel,
            ], 200);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Error updating hotel');
        }
    }
    

    public function delete($id)
    {
        try {
            $hotel = Hotel::findOrFail($id);

            $this->hotelService->deleteHotel($hotel);

            return response()->json([
                'message' => 'Hotel deleted successfully.',
                'state' => true,
            ], 200);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Error deleting hotel');
        }
    }

    private function handleException(\Exception $e, $defaultMessage)
    {
        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'message' => 'Hotel not found.',
                'state' => false,
            ], 404);
        }

        if ($e instanceof ValidationException) {
            $message = '';
            foreach ($e->errors() as $fieldErrors) {
                $message .= implode(", ", $fieldErrors) . "; ";
            }
            return response()->json([
                'message' => 'Validation errors: ' . $message,
                'state' => false,
            ], 422);
        }

        return response()->json([
            'message' => $defaultMessage . ': ' . $e->getMessage(),
            'state' => false,
        ], 500);
    }
}
