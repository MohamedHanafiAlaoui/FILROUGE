<?php

namespace App\Http\Controllers;

use App\Models\FichesExplicatives;
use Illuminate\Http\Request;

class FichesExplicativesController extends Controller
{
    public function index()
    {
        $fiches = FichesExplicatives::with('problems')->get();
        return view('fiches.index', compact('fiches'));
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

        foreach ($request->problems as $problemData) {
            $fiche->problems()->create([
                'symptoms' => $problemData['symptoms'],
                'solutions' => $problemData['solutions'],
            ]);
        }

        $fiches = FichesExplicatives::with('problems')->get();
        return view('fiches.index', compact('fiches'));
    }

    public function show(FichesExplicatives $fichesExplicative)
    {
        $fiche = $fichesExplicative->load('problems');
        return view('fiches.show', compact('fiche'));
    }

    public function update(Request $request, FichesExplicatives $fichesExplicative)
    {
        $request->validate([
            'image' => 'sometimes|string',
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
        ]);

        $fichesExplicative->update($request->only(['image', 'name', 'description']));

        $fiches = FichesExplicatives::with('problems')->get();
        return view('fiches.index', compact('fiches'));
    }

    public function destroy(FichesExplicatives $fichesExplicative)
    {
        $fichesExplicative->problems()->delete();
        $fichesExplicative->delete();

        $fiches = FichesExplicatives::with('problems')->get();
        return view('fiches.index', compact('fiches'));
    }
}
