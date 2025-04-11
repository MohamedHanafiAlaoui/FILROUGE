<?php

namespace App\Http\Controllers;

use App\Models\FichesExplicatives;
use Illuminate\Http\Request;

class FichesExplicativesController extends Controller
{
    public function index()
    {
        $fiches = FichesExplicatives::with('problems')->get();
        return response()->json($fiches, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|string',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',

            'problems' => 'required|array|min:1',
            'problems.*.symptoms' => 'required|string',
            'problems.*.solutions' => 'required|string',
        ]);

        $fiche = FichesExplicatives::create([
            'image' => $request->image,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $createdProblems = [];
        foreach ($request->problems as $problemData) {
            $createdProblems[] = $fiche->problems()->create([
                'symptoms' => $problemData['symptoms'],
                'solutions' => $problemData['solutions'],
            ]);
        }

        return response()->json([
            'message' => 'Fiche and problems created successfully.',
            'fiche' => $fiche,
            'problems' => $createdProblems,
        ], 201);
    }

    public function show(FichesExplicatives $fichesExplicative)
    {
        return response()->json($fichesExplicative->load('problems'));
    }

    public function update(Request $request, FichesExplicatives $fichesExplicative)
    {
        $request->validate([
            'image' => 'sometimes|string',
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
        ]);

        $fichesExplicative->update($request->only(['image', 'name', 'description']));

        return response()->json([
            'message' => 'Fiche updated successfully.',
            'fiche' => $fichesExplicative,
        ]);
    }

    public function destroy(FichesExplicatives $fichesExplicative)
    {
        // Optional: delete related problems
        $fichesExplicative->problems()->delete();
        $fichesExplicative->delete();

        return response()->json(['message' => 'Fiche and related problems deleted.'], 204);
    }
}
