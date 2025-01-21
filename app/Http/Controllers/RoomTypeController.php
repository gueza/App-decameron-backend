<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use App\Services\ExceptionHandlerService;

class RoomTypeController extends Controller
{
    private $exceptionHandler;

    public function __construct(ExceptionHandlerService $exceptionHandler)
    {
        $this->exceptionHandler = $exceptionHandler;
    }

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
            return $this->exceptionHandler->handle($e, 'Error listing room types');
        }
    }
}
