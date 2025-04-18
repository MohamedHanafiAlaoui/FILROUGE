<?php

namespace App\Http\Controllers;

use App\Models\SolutionsAdaptees;
use App\Models\User;
use Illuminate\Http\Request;

class SolutionsAdapteesController extends Controller
{
    public function index()
    {
        $solutions = SolutionsAdaptees::with(['agriculteur', 'agricole'])->get();
        return view('solutions.index', compact('solutions'));
    }

    public function create()
    {
        $agriculteurs = User::all(); 
        return view('solutions.create', compact('agriculteurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_agriculteur' => 'required|exists:users,id',
            'id_agricole' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
        ]);

        SolutionsAdaptees::create($request->all());

        return redirect()->route('solutions.index')->with('success', 'Solution créée avec succès.');
    }

    public function edit(SolutionsAdaptees $solutionsAdaptee)
    {
        $agriculteurs = User::all();
        return view('solutions.edit', compact('solutionsAdaptee', 'agriculteurs'));
    }

    public function update(Request $request, SolutionsAdaptees $solutionsAdaptee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $solutionsAdaptee->update([
            'name' => $request->name,
        ]);

        return redirect()->route('solutions.index')->with('success', 'Solution mise à jour.');
    }

    public function destroy(SolutionsAdaptees $solutionsAdaptee)
    {
        $solutionsAdaptee->delete();
        return redirect()->route('solutions.index')->with('success', 'Solution supprimée.');
    }
}
