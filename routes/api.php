<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLocationController;
use App\Http\Controllers\FavPlaceController;
use App\Http\Controllers\RestaurantsController;
use App\Http\Controllers\HotelController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/favplace', [FavPlaceController::class, 'show']); 
Route::get('/restaurant', [RestaurantsController::class, 'show']);
Route::get('/hotel', [HotelController::class, 'show']);

Route::put('/submit-data', [UserLocationController::class, 'store'])->name('submit-data');

Route::post('/register', [UserLocationController::class, 'register']);

Route::get('/favplaces', [FavPlaceController::class, 'show'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->post('/favplace', [FavPlaceController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/favplace', [FavPlaceController::class, 'destroy']);