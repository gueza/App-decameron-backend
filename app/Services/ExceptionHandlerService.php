<?php
namespace App\Services;

use Illuminate\Http\JsonResponse;

class ExceptionHandlerService
{
    public function handle(\Exception $e, string $defaultMessage): JsonResponse
    {
        return response()->json([
            'message' => $defaultMessage . ': ' . $e->getMessage(),
            'state' => false,
        ], 500);
    }
}
