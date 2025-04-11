<?php

namespace App\Http\Controllers;

use App\Models\CalendarEntry;
use Illuminate\Http\Request;

class CalendarEntryController extends Controller
{
    public function index($id)
    {
        $CalendarEntry=CalendarEntry::all()->where('id_Calendar',$id);

        return response()->json($CalendarEntry,200);

    }


    public function store(CalendarEntryRequest $request)
    {

        $CalendarEntry = CalendarEntry::Create($request->validated());

        return response()->json($CalendarEntry,200);
        
        
    }


    public function   update (Request $request,$id)
    {
        $CalendarEntry=CalendarEntry::findOrFail($id);
        $request->validate([
            'image'=>"required|string",
            'name'=>"required|string",
            'etapes'=>"required|string",
        ]);

        $CalendarEntry-> Ubdate($request->all());

        return response()->json($CalendarEntry,200);
    }

    


}
