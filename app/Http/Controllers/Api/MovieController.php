<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return response()->json(Movie::with('characters')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'classification' => 'required|string',
            'release_date' => 'required|date',
            'review' => 'required|string',
            'season' => 'nullable|integer'
        ]);

        $movie = Movie::create($validated);
        return response()->json($movie, 201);
    }
}