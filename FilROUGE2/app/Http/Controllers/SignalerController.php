<?php
namespace App\Http\Controllers;

use App\Models\Signaler;
use App\Models\Calendrier;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SignalerController extends Controller
{
    public function index(Request $request)
    {
        $query = Signaler::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }


        $signalers = $query->paginate(10);

        return view('agriculteur.signalers', compact('signalers'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|image',
            'name' => 'required|string|max:255',
            'description' => 'required',
            'id_culture' => 'required',
        ]);

        $imagePath = Storage::disk('public')->putFile('problems', $request->file('image'));

        Signaler::create([
            'image' => $imagePath,
            'name' => $request->name,
            'description' => $request->description,
            'id_culture' => $request->id_culture,
        ]);

        
        return redirect()->route('signalers.index')->with('success', 'Signalement ajouté avec succès.');
    }

    public function show($id)
    {
        $signaler = Signaler::findOrFail($id);
        return view('agriculteur.detailsSignalers', compact('signaler'));
    }



    public function update(Request $request, $id)
    {
        $signaler = Signaler::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'id_culture' => 'required|exists:calendriers,id',
            'image' => 'nullable|file|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = file_get_contents($request->file('image'));
        }

        $signaler->update($data);

        return redirect()->route('signalers.index')->with('success', 'Signalement mis à jour.');
    }

    public function destroy($id)
    {
        $signaler = Signaler::findOrFail($id);
        $signaler->delete();

        return redirect()->route('signalers.index')->with('success', 'Signalement supprimé.');
    }
}
