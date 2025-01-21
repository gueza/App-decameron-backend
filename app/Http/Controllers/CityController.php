<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Services\ExceptionHandlerService;

class CityController extends Controller
{
    private $exceptionHandler;

    public function __construct(ExceptionHandlerService $exceptionHandler)
    {
        $this->exceptionHandler = $exceptionHandler;
    }

    public function list()
    {
        try {
            $cities = City::where('cit_state', 1)->get();

            return response()->json([
                'message' => 'Cities list successfully.',
                'state' => true,
                'data' => $cities,
            ], 200);
        } catch (\Exception $e) {
            return $this->exceptionHandler->handle($e, 'Error listing cities');
        }
    }
}
