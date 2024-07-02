<?php

namespace App\Http\Controllers;

use App\Models\Activitties;
use App\Models\ActivittiesResponses;
use Illuminate\Http\Request;

class ActivittiesResponsesController extends Controller
{
    public function index (Request $request)
    {
        $activitties  = Activitties::get();
        return view('activittiesresponses', compact('activitties'));
    }

    public function create()
    {
        $activity = Activitties::all();
        return view('responsesshow', compact('activity'));
    }


        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'activity_id' => 'required|integer|exists:activitties,id',
                'filepath' => 'nullable|file|mimes:jpg,png,jpeg,gif|max:2048',
                'description' => 'required|string|max:1000',
            ]);

            $activity = Activitties::find($validatedData['activity_id']);

            if ($request->hasFile('filepath')) {
                $image = $request->file('filepath');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $filePath = public_path('images');
                $image->move($filePath, $imageName);
                $validatedData['filepath'] = 'images/' . $imageName;
            } else {
                $validatedData['filepath'] = null;
            }

            $activity = Activitties::create([
                'user_id' => auth()->user()->id,
                'dicipline_id' => $activity->dicipline_id,
                'filepath' => $validatedData['filepath'],
                'description' => $validatedData['description'],
            ]);

            return redirect()->route('VerRespostas')->with('success', 'Resposta Enviada!');
        }


    public function show($id)
    {
        $activity = Activitties::where('id', $id)->first();
        return view('responsesshow', compact('activity'));
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

