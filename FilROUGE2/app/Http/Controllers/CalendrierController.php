<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalendrierRequest;
use App\Models\Calendrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendrierController extends Controller
{
   
    public function index()
    {
        $user_id = Auth::user()->id;
        $calendars = Calendrier::where('id_agriculteur', $user_id)->get();
        
        return view('agriculteur.Calendrier', compact('calendars'));
    }

    
    public function store(CalendrierRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['id_agriculteur'] = Auth::id(); 
        Calendrier::create($validatedData);
        return redirect()->route('agriculteur.Calendrier')->with('success', 'Calendrier ajouté avec succès');
    }

    public function update(Request $request, $id)
    {
        $calendar = Calendrier::findOrFail($id);

        $request->validate([
            'image' => "required|string",
            'name' => "required|string",
            'etapes' => "required|string",
        ]);

        $calendar->update($request->all());

        return redirect()->route('agriculteur.Calendrier')->with('success', 'Calendrier ajouté avec succès');

    }

    public function show($id)
    {
        $calendar = Calendrier::findOrFail($id);
        return view('calendrier.show', compact('calendar'));
    }

    public function destroy($id)
    {
        $calendar = Calendrier::findOrFail($id);
        $calendar->delete();

        return redirect()->route('agriculteur.Calendrier')->with('success', 'Calendrier supprimé avec succès');

    }
}
