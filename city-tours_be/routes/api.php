<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TourController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('tours', [TourController::class, 'index']);
Route::get('tours/{id}', [TourController::class, 'show']);
Route::post('tours', [TourController::class, 'store']);
Route::post('tours/process-report', [TourController::class, 'processReport']);
Route::get('algorithm/closest-upcoming-tour', [TourController::class, 'closestTours']);
