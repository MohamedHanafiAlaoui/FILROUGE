<?php

namespace App\Http\Controllers;

use App\Models\CalendarEntry;
use App\Models\Calendrier;
use App\Models\Etapes;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class CalendarEntryController extends Controller
{
    public function index($id)
    {
        $calendarEntries = CalendarEntry::with('etape')->where('id_Calendar', $id)->get();
        $etapes = Etapes::all();
        $user_id = Auth::user()->id;
        $calendar = Calendrier::where('id', $id)
                          ->where('id_agriculteur', $user_id)
                          ->firstOrFail(); 

        return view('agriculteur.etepes', compact('calendarEntries' , 'calendar','etapes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_Calendar' => 'required|integer', 
            'id_etapes' => 'required|integer',
            'description' => 'required|string|max:255',
        ]);
    
        CalendarEntry::create($validated);
    
        return redirect()->route('calendar.entries', ['id' => $request->id_Calendar])
        ->with('success', 'Étape ajoutée avec succès');    }

    public function update(Request $request, $id)
    {
        $calendarEntry = CalendarEntry::findOrFail($id);

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
