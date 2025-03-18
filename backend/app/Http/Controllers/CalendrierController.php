<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalendrierRequest;
use App\Models\Calendrier;
use Illuminate\Http\Request;

class CalendrierController extends Controller
{
    public function index()
    {
        $Calendar =  Calendrier::all()->where('id_agriculteur',3);
        return response()->json($Calendar,200);
    }
    public function store(CalendrierRequest $request)
    {
        $Calendar = Calendrier::Create($request->validated());

        return response()->json($Calendar,200);
    }

    public function     update (Request $request,$id)
    {
        $Calendar=Calendrier::findOrFail($id);
        $request->validate([
            'image'=>"required|string",
            'name'=>"required|string",
            'etapes'=>"required|string",
        ]);

        $Calendar-> Ubdate($request->all());

        return response()->json($Calendar,200);

    }

    public function show($id)
    {
        $Calendar=Calendrier::find($id);


        return response()->json($Calendar,200);

    }

    public function destroy($id)
    {
        $Calendar=Calendrier::findOrFail($id);

        $Calendar->delete();

        return response()->json($Calendar,200);
    }



}
