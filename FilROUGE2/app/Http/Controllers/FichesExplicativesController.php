<?php

namespace App\Http\Controllers;

use App\Models\EtapeTechnique;
use App\Models\FichesExplicatives;
use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FichesExplicativesController extends Controller
{
    public function index(Request $request)
    {
        $query = FichesExplicatives::query();


        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $fiches = $query->get();

        return view('agriculteur.FichesExplicatives', compact('fiches'));
    }

    public function Adminindex()
    {
        $fiches = FichesExplicatives::withCount(['problems', 'etapeTechniques'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.FichesExplicatives', compact('fiches'));
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

            // Add validation for EtapeTechnique fields
            'etapes' => 'nullable|array',
            'etapes.*.nameetape' => 'required|string',
            'etapes.*.descriptionetape' => 'nullable|string',
            'etapes.*.duree_estimee' => 'required|string',
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

        // Handle EtapeTechnique creation
        if ($request->has('etapes')) {
            foreach ($request->etapes as $etapeData) {
                EtapeTechnique::create([
                    'nameetape' => $etapeData['nameetape'],
                    'descriptionetape' => $etapeData['descriptionetape'],
                    'duree_estimee' => $etapeData['duree_estimee'],
                    'id_FichesExplicatives' => $fiche->id,
                ]);
            }
        }

        $fiches = FichesExplicatives::with('problems', 'etapeTechniques')->get();  // Include etapes in the relationship
        return view('admin/create', compact('fiches'));
    }


    public function show($id)
    {
        $fiche = FichesExplicatives::findOrFail($id);
        $problems = Problem::where('id_FichesExplicatives', $id)->get();
        $etapes = EtapeTechnique::where('id_FichesExplicatives', $id)->get();


        return view('agriculteur/Technique', compact('fiche', 'etapes', 'problems'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'required|string',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'problems' => 'required|array|min:1',
            'problems.*.symptoms' => 'required|string',
            'problems.*.solutions' => 'required|string',
            'etapes' => 'nullable|array',
            'etapes.*.nameetape' => 'required|string',
            'etapes.*.descriptionetape' => 'nullable|string',
            'etapes.*.duree_estimee' => 'required|integer',
        ]);

        try {
            DB::transaction(function () use ($validatedData, $id) {
                // Find the record or fail
                $fiche = FichesExplicatives::findOrFail($id);

                // Update the main fiche data
                $fiche->update([
                    'image' => $validatedData['image'],
                    'name' => $validatedData['name'],
                    'description' => $validatedData['description'] ?? null,
                ]);

                // Delete existing problems and create new ones
                $fiche->problems()->delete();
                $fiche->problems()->createMany($validatedData['problems']);

                // Delete existing steps and create new ones if provided
                $fiche->etapeTechniques()->delete();
                if (!empty($validatedData['etapes'])) {
                    $fiche->etapeTechniques()->createMany($validatedData['etapes']);
                }
            });

            // Redirect with success message
            return redirect()->route('fiches.edit', $id)
                ->with('success', 'Fiche updated successfully');

        } catch (\Exception $e) {
            // Redirect back with error message if something goes wrong
            return back()->withInput()
                ->with('error', 'Error updating fiche: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        // Find the fiche with its relationships or fail with 404
        $fiche = FichesExplicatives::with(['problems', 'etapeTechniques'])
            ->findOrFail($id);

        // Return the edit view with the fiche data
        return view('admin.Update', [
            'fiche' => $fiche,
            'currentProblems' => $fiche->problems,
            'currentEtapes' => $fiche->etapeTechniques
        ]);
    }
}
