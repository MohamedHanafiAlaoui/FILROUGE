<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    public function index($id)
    {
        $problems = Problem::all()->where('id_FichesExplicatives',$id);
        return response()->json($problems);
    }



    public function store(Request $request)
    {
        $request->validate([
            'symptoms' => 'required|string',
            'solutions' => 'required|string',
            'id_FichesExplicatives' => 'required|exists:fiches_explicatives,id',
        ]);

        $problem = Problem::create($request->all());

        return response()->json($problem, 201);
    }

    public function update(Request $request, $id)
    {
        $problem = Problem::find($id);
        if ($problem) {
            $request->validate([
                'symptoms' => 'required|string',
                'solutions' => 'required|string',
                'id_FichesExplicatives' => 'required|exists:fiches_explicatives,id',
            ]);

            $problem->update($request->all());
            return response()->json($problem);
        } else {
            return response()->json(['message' => 'Problem not found'], 404);
        }
    }

    public function destroy($id)
    {
        $problem = Problem::find($id);
        if ($problem) {
            $problem->delete();
            return response()->json(['message' => 'Problem deleted successfully']);
        } else {
            return response()->json(['message' => 'Problem not found'], 404);
        }
    }
}
