<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
        return Character::with('movie')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'movie_id' => 'required|exists:movies,id',
            'image' => 'required|url',
            'description' => 'required|string',
        ]);

        return Character::create($validated);
    }

    public function show($id)
    {
        return Character::with('movie')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $character = Character::findOrFail($id);
        $character->update($request->all());
        return $character;
    }

    public function destroy($id)
    {
        Character::destroy($id);
        return response()->json(['message' => 'Personaje eliminado']);
    }
}
