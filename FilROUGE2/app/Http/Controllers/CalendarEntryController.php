<?php

namespace App\Http\Controllers;

use App\Models\CalendarEntry;
use Illuminate\Http\Request;

class CalendarEntryController extends Controller
{
    public function index($id)
    {
        // $CalendarEntrys=CalendarEntry::all()->where('id_Calendar',$id);
        $calendarEntries = CalendarEntry::where('id_Calendar', $id)->get();

        return view('agriculteur.etepes', compact('calendarEntries'));

    }


    public function store(CalendarEntryRequest $request)
    {

        $CalendarEntry = CalendarEntry::Create($request->validated());

        $entries = CalendarEntry::where('id_Calendar', $CalendarEntry->id_Calendar)->get();

        return view('calendar.index', compact('entries')); return view('calendar.index', compact('entries'));
        
        
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
        $entries = CalendarEntry::where('id_Calendar', $CalendarEntry->id_Calendar)->get();

        return view('calendar.index', compact('entries'));
    }

    


}
