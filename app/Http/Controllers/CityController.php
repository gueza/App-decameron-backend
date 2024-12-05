<?php

namespace App\Http\Controllers;

use App\Models\City;

class CityController extends Controller
{
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
            return $this->handleException($e, 'Error listing cities');
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
