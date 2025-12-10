<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController; 


Route::get('/tours', [TourController::class, 'index']);
Route::get('/tours/{id}', [TourController::class, 'show']); 
Route::post('/save-tours', [TourController::class, 'store']); 
Route::post('/tours/process-report', [TourController::class, 'processReports']); 