<?php

namespace App\Http\Controllers;

use App\Models\Signaler;
use Illuminate\Http\Request;

class SignalerController extends Controller
{
    public function index()
    {
        $signalers = Signaler::with('calendrier')->get();
        return response()->json($signalers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|string',
            'name' => 'required|string',
            'id_Calendar' => 'required|exists:calendriers,id',
        ]);

        $signaler = Signaler::create($request->all());
        return response()->json($signaler, 201);
    }

    public function show($id)
    {
        $signaler = Signaler::with('calendrier')->findOrFail($id);
        return response()->json($signaler);
    }

    public function update(Request $request, $id)
    {
        $signaler = Signaler::findOrFail($id);

        $request->validate([
            'image' => 'sometimes|required|string',
            'name' => 'sometimes|required|string',
            'id_Calendar' => 'sometimes|required|exists:calendriers,id',
        ]);

        $signaler->update($request->all());
        return response()->json($signaler);
    }

    public function destroy($id)
    {
        $signaler = Signaler::findOrFail($id);
        $signaler->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
