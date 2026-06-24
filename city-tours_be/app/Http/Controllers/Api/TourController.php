<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Http\Requests\StoreTourRequest;
use Illuminate\Http\JsonResponse;

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
}
