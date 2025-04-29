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


}
