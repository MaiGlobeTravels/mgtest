<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tours;

class AlgorithmController extends Controller
{
    public function upcomingTours(Request $request)
    {
            $today = strtotime('today');

            $tours = Tours::all();
    
            $closestTour = null;
            $minDiff = PHP_INT_MAX;
    
            foreach ($tours as $tour) {
                $tourDate = strtotime($tour->date);
                if ($tourDate >= $today) {
                    $diff = $tourDate - $today;
                    if ($diff < $minDiff) {
                        $minDiff = $diff;
                        $closestTour = $tour;
                    }
                }
            }
    
            if ($closestTour) {
                return response()->json($closestTour);
            } else {
                return response()->json(['message' => 'No upcoming tours'], 404);
            }   
    }
}
