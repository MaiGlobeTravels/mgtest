<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes (v1)
|--------------------------------------------------------------------------
|
| Public routes:
*/

    Route::get('health', function () {
        return response()->json(['status' => 'ok']);
    });

    // public resources...
    Route::prefix('tours')->group(function () {
        Route::get('/', [App\Http\Controllers\API\TourController::class, 'index']);
        Route::get('/{id}', [App\Http\Controllers\API\TourController::class, 'show']);
        Route::post('/', [App\Http\Controllers\API\TourController::class, 'store']);
        Route::post('/process-report', [App\Http\Controllers\API\TourController::class, 'generateReport']);
    });


/*
|--------------------------------------------------------------------------
| Protected routes (sanctum)
|--------------------------------------------------------------------------
| Use 'auth:sanctum' for SPA/session or token-based auth.
*/
// Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
//     Route::get('user', function (Request $request) {
//         return $request->user();
//     });

//     // protected resources...
// });


// ...existing code...