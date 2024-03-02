<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\UserLocation;
use App\Http\Controllers\FavPlaceController;

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

Route::put('/submit-data', [UserLocation::class, 'store'])->name('submit-data');