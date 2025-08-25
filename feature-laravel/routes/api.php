<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/tours', [\App\Http\Controllers\TourController::class, 'index']);
Route::post('/tours', [\App\Http\Controllers\TourController::class, 'store']);
