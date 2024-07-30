<?php

namespace App\Http\Controllers;

use App\Models\Activitties;
use App\Models\ActivittiesResponses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerRespostasController extends Controller
{
    public function index ($id)
    {
        $activitties = ActivittiesResponses::where('activitties_id', $id)
        ->where('check', false)
        ->with('user')
        ->get();

        return view('responses', compact('activitties'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'activity_id' => 'required|exists:activitties_responses,id',
            'check' => 'required|boolean',
            'note' => 'required|numeric|min:0|max:10',
        ]);

        $activity = ActivittiesResponses::find($request->activity_id);

        if ($activity) {

            $activity->update([
                'check' => $validatedData['check'],
                'note' => $validatedData['note'],
            ]);

            return redirect()->route('VerRespostas', ['id' => $activity->id])->with('success', 'Atividade Corrigida!');
        } else {
            return redirect()->route('VerRespostas', ['id' => $activity->id])->with('fail', 'Atividade não encontrada!');
        }
    }

    public function show($id) {
            $activity  = ActivittiesResponses::with('activity')->find($id);
            if(!$activity){
                return redirect()->route('VerRespostas', ['id' => $id])->with('fail', 'Resposta não encontrada.');
            }
            return view('responsesshowprof', compact('activity'));
        }

    public function download($id)
        {
        $activity = Activitties::findOrFail($id);
        $filePath = public_path($activity->filepath);

        if (file_exists($filePath)) {
        return response()->download($filePath);
        } else {
        return redirect()->back()->with('error', 'Arquivo não encontrado.');
        }
        }

}
