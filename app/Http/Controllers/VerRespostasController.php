<?php

namespace App\Http\Controllers;

use App\Models\Activitties;
use App\Models\ActivittiesResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerRespostasController extends Controller
{
    public function index ()
    {
        $activitties  = ActivittiesResponses::get();
        return view('responses', compact('activitties'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'activity_id' => 'required|integer|exists:activitties,id',
            'filepath' => 'nullable|file|mimes:jpg,png,jpeg,gif|max:2048',
            'description' => 'required|string|max:1000',
            'check' => 'required|string|max:1000',
            'note' => 'required|boolean',
        ]);
        $activity = ActivittiesResponses::find($validatedData['activity_id']);

        if ($request->hasFile('filepath')) {
            $image = $request->file('filepath');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $filePath = public_path('images');
            $image->move($filePath, $imageName);
            $validatedData['filepath'] = 'images/' . $imageName;
        } else {
            $validatedData['filepath'] = null;
        }
        $activity = ActivittiesResponses::create([
            'user_id' => Auth::user()->id,
            'activitties_id' => $request->activity_id,
            'filepath' => $validatedData['filepath'],
            'description' => $validatedData['description'],
            'check' => $validatedData['check'],
            'note' => $validatedData['note'],
        ]);

        return redirect()->route('VerRespostas')->with('success', 'Resposta Enviada!');
    }

        public function show($id) {
            $activitties = Activitties::all();
            return view('responsesshowprof', compact('activitties'));
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
