<?php

namespace App\Http\Controllers;

use App\Models\Stadesculture;
use App\Models\cultures;
use App\Models\Etapes;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class StadescultureController extends Controller
{
    public function index($id)
    {
        $calendarEntries = Stadesculture::with('etape')->where('id_culture', $id)->get();
        $etapes = Etapes::all();
        $user_id = Auth::user()->id;
        $calendar = cultures::where('id', $id)
            ->where('id_agriculteur', $user_id)
            ->firstOrFail();

        return view('agriculteur.etepes', compact('calendarEntries', 'calendar', 'etapes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_culture' => 'required|integer',
            'id_etapes' => 'required|integer',
            'description' => 'required|string|max:255',
        ]);

        Stadesculture::create($validated);

        return redirect()->route('calendar.entries', ['id' => $request->id_culture])
            ->with('success', 'Étape ajoutée avec succès');
    }

    public function update(Request $request, $id)
    {
        $calendarEntry = Stadesculture::findOrFail($id);

        $request->validate([
            'id_Calendar' => 'required|exists:calendriers,id',
            'id_etapes' => 'required|exists:etapes,id',
            'description' => 'required|string|max:255',
        ]);

        $calendarEntry->update($request->all());
        return redirect()->route('calendar.entries', ['id' => $request->id_Calendar])
            ->with('success', 'Étape ajoutée avec succès');

    }
}
