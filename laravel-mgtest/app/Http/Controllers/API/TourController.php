<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tours::all();
        return response()->json($tours);
    }

    public function show($id)
    {
        $tour = Tours::find($id);
        if (!$tour) {
            return response()->json(['message' => 'Tour not found'], 404);
        }
        return response()->json($tour);
    }

    public function store(TourRequest $request)
    {
        $tour = Tours::create($request->validated());
        return response()->json($tour, 201);
    }

    public function report(Request $request)
    {
        $tours = Tours::all();
        sleep(5);

        $dir = storage_path('app/reports');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $titles = $tours->pluck('title')->filter()->values()->all();

        $filename = 'tours_report_' . time() . '.txt';
        $path = $dir . DIRECTORY_SEPARATOR . $filename;
        file_put_contents($path, implode(PHP_EOL, $titles));

        Log::info('Report Generated', ['file' => $path]);

        return response()->json(['message' => 'Report generated', 'file' => $filename], 200);
    }
    
}
