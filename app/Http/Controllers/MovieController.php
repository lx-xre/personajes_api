<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return Movie::with('characters')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'genre' => 'required|string',
            'release_date' => 'required|date',
            'review' => 'required|string',
            'season' => 'nullable|string',
        ]);

        return Movie::create($validated);
    }

    public function show($id)
    {
        return Movie::with('characters')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());
        return $movie;
    }

    public function destroy($id)
    {
        Movie::destroy($id);
        return response()->json(['message' => 'Película eliminada']);
    }
}
