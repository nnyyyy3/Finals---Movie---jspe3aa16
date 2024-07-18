<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with(['directors', 'actors', 'genres', 'ratings.reviewer'])->get();
        return response()->json($movies);
    }

    public function show($id)
    {
        $movie = Movie::with(['directors', 'actors', 'genres', 'ratings.reviewer'])->findOrFail($id);
        return response()->json($movie);
    }
}
