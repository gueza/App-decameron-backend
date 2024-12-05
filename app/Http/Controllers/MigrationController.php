<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class MigrationController extends Controller
{
    public function runMigrations()
    {
        try {
            Artisan::call('migrate:reset', ['--force' => true]);
            Log::info('Migrations reset successfully.');

            Artisan::call('migrate', ['--force' => true]);
            Log::info('Migrations executed successfully.');

            Artisan::call('db:seed', ['--force' => true]);
            Log::info('Database seeding completed successfully.');

            return response()->json([
                'message' => 'Migrations and seeding executed successfully.',
                'status' => true
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error running migrations: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error executing migrations and seeding.',
                'status' => false
            ], 500);
        }
    }
}
