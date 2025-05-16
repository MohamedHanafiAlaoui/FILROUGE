<?php

namespace App\Http\Controllers;

use App\Models\HistoriqueQuestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoriqueQuestionController extends Controller
{
    public function index()
    {
        $questions = HistoriqueQuestions::where('id_agricole', Auth::id())
            ->latest('updated_at')
            ->paginate(10);

        $editingQuestion = null;

        if(request()->has('edit')) {
            $editingQuestion = HistoriqueQuestions::where('id_agricole', Auth::id())
                ->find(request('edit'));

            if(!$editingQuestion) {
                return redirect()->route('agricole.historique-questions')
                    ->with('error', 'Question introuvable');
            }
        }

        return view('agricole.historique-questions', compact('questions', 'editingQuestion'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:1000',
        ]);

        HistoriqueQuestions::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'id_agricole' => Auth::id()
        ]);

        return redirect()->route('agricole.historique-questions')
            ->with('success', 'Question ajoutée avec succès');
    }

    public function edit($id)
    {
        return redirect()->route('agricole.historique-questions', ['edit' => $id]);
    }

    public function update(Request $request, $id)
    {
        $question = HistoriqueQuestions::where('id_agricole', Auth::id())
            ->findOrFail($id);

        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:1000',
        ]);

        $question->update($request->only('question', 'answer'));

        return redirect()->route('agricole.historique-questions')
            ->with('success', 'Question mise à jour avec succès');
    }

    public function destroy($id)
    {
        $question = HistoriqueQuestions::where('id_agricole', Auth::id())
            ->findOrFail($id);
            
        $question->delete();

        return redirect()->route('agricole.historique-questions')
            ->with('success', 'Question supprimée définitivement');
    }
}