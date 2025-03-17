<?php

namespace App\Http\Controllers;

use App\Models\Calendrier;
use Illuminate\Http\Request;

class CalendrierController extends Controller
{
    public function index()
    {
        $Calendar =  Calendrier::all();
        return response()->json($Calendar,200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'image'=>"required|string",
            'name'=>"required|string",
            'etapes'=>"required|string",
        ]);

        $Calendar = Calendrier::Create(
        [
            'image'=>$request->image,
            'name'=>$request->name,
            'id_agriculteur',
            'etapes'=>$request->etapes,
        ]);

        return response()->json($Calendar,200);
    }


}
