<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\FichesExplicatives;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    public function index($ficheId)
    {
        $fiche = FichesExplicatives::findOrFail($ficheId);
        $problems = Problem::where('id_FichesExplicatives', $ficheId)->get();

        return view('problems.index', compact('fiche', 'problems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'symptoms' => 'required|string',
            'solutions' => 'required|string',
            'id_FichesExplicatives' => 'required|exists:fiches_explicatives,id',
        ]);

        Problem::create($request->all());

        return redirect()->route('problems.index', $request->id_FichesExplicatives)
                         ->with('success', 'Problème ajouté avec succès.');
    }

    public function update(Request $request, $id)
    {
        $problem = Problem::findOrFail($id);

        $request->validate([
            'symptoms' => 'required|string',
            'solutions' => 'required|string',
            'id_FichesExplicatives' => 'required|exists:fiches_explicatives,id',
        ]);

        $problem->update($request->all());

        return redirect()->route('problems.index', $problem->id_FichesExplicatives)
                         ->with('success', 'Problème mis à jour.');
    }

    public function destroy($id)
    {
        $problem = Problem::findOrFail($id);
        $ficheId = $problem->id_FichesExplicatives;
        $problem->delete();

        return redirect()->route('problems.index', $ficheId)
                         ->with('success', 'Problème supprimé.');
    }
}
