<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    // Listar personajes con sus películas
    public function index()
    {
        return response()->json(Character::with('movies')->get());
    }

    // Guardar un nuevo personaje
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'picture_url' => 'required|url',
            'description' => 'required|string',
            'movies' => 'array' // IDs de películas existentes
        ]);

        $character = Character::create($validated);

        // Si envías un arreglo de IDs de películas, los vincula automáticamente
        if ($request->has('movies')) {
            $character->movies()->attach($request->movies);
        }

        return response()->json($character->load('movies'), 201);
    }

    // Ver un personaje específico
    public function show(Character $character)
    {
        return response()->json($character->load('movies'));
    }
}
