<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => \App\Models\Tour::all()
        ]);
    }

    public function show($id)
    {
        $tour = \App\Models\Tour::find($id);

        if (!$tour) {
            return response()->json(['message' => 'Tour not found'], 404);
        }

        return response()->json(['data' => $tour]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'price' => 'required|numeric',
            'date' => 'required|date'
        ]);

        try {
            $tour = \App\Models\Tour::create($validated);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error creating tour', 'error' => $e->getMessage()], 500);
        }

        return response()->json(['data' => $tour], 201);
    }
}