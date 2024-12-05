<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomTypeAccommodationController;

// Hotels
Route::get('hotels', [HotelController::class, 'list']);
Route::post('hotels', [HotelController::class, 'store']);
Route::put('hotels/{id}', [HotelController::class, 'update']);
Route::delete('hotels/{id}', [HotelController::class, 'delete']);

// Rooms
Route::get('rooms', [RoomController::class, 'list']);
Route::get('rooms-by-hotel', [RoomController::class, 'getRoomsByHotel']);
Route::post('rooms', [RoomController::class, 'store']);
Route::put('rooms/{id}', [RoomController::class, 'update']);
Route::delete('rooms/{id}', [RoomController::class, 'delete']);

// Accomodations
Route::get('/accommodations', [AccommodationController::class, 'list']);
Route::get('/accommodations-by-room-type', [AccommodationController::class, 'getAccommodationsByRoomType']);

// City
Route::get('/city', [CityController::class, 'list']);

// RoomType
Route::get('/room-type', [RoomTypeController::class, 'list']);


