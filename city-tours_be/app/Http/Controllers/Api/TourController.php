<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Http\Requests\StoreTourRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

class TourController extends Controller
{
    /**
     * Return all tours.
     */
    public function index(): JsonResponse
    {
        $tours = Tour::all();
        return response()->json($tours);
    }

    /**
     * Return a single tour.
     */
    public function show($id): JsonResponse
    {
        $tour = Tour::findOrFail($id);
        return response()->json($tour);
    }

    /**
     * Store a new tour.
     */
    public function store(StoreTourRequest $request): JsonResponse
    {
        $data = $request->validated();
        $tour = Tour::create($data);
        return response()->json($tour, 201);
    }

    /**
     * Generate a text report of tour titles, sleep 5 seconds, and log when done.
     */
    public function processReport(): JsonResponse
    {
        sleep(5);

        $titles = Tour::pluck('title')->toArray();
        $content = implode(PHP_EOL, $titles) . PHP_EOL;

        $path = 'reports/tours_report_' . Carbon::now()->format('Ymd_His') . '.txt';
        Storage::disk('local')->put($path, $content);

        Log::info('Report generated');

        return response()->json(['message' => 'Report generated', 'path' => $path], 200);
    }
}
