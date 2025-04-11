<?php

namespace App\Http\Controllers;

use App\Models\SolutionsAdaptees;
use Illuminate\Http\Request;

class SolutionsAdapteesController extends Controller
{
    public function index()
    {
        $solutions = SolutionsAdaptees::with(['agriculteur', 'agricole'])->get();
        return response()->json([
            'message' => 'Liste des solutions adaptées',
            'data' => $solutions,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_agriculteur' => 'required|exists:users,id',
            'id_agricole' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
        ]);

        $solution = SolutionsAdaptees::create($request->all());

        return response()->json([
            'message' => 'Solution créée avec succès',
            'data' => $solution,
        ], 201);
    }

    public function show(SolutionsAdaptees $solutionsAdaptee)
    {
        return response()->json([
            'data' => $solutionsAdaptee->load(['agriculteur', 'agricole']),
        ]);
    }

    public function update(Request $request, SolutionsAdaptees $solutionsAdaptee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $solutionsAdaptee->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Solution mise à jour avec succès',
            'data' => $solutionsAdaptee,
        ]);
    }

    public function destroy(SolutionsAdaptees $solutionsAdaptee)
    {
        $solutionsAdaptee->delete();
        return response()->json([
            'message' => 'Solution supprimée avec succès',
        ], 204);
    }
}
