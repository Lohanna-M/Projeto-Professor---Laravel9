<?php

namespace App\Http\Controllers;

use App\Models\Activitties;
use App\Models\ActivittiesResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivittiesResponsesController extends Controller
{
    public function index (Request $request)
    {
        $activitties  = Activitties::get();
        return view('activittiesresponses', compact('activitties'));
    }

        public function store(Request $request)
        {

            $validatedData = $request->validate([
                'activity_id' => 'required|integer|exists:activitties,id',
                'filepath' => 'nullable|file|mimes:jpg,png,jpeg,gif|max:2048',
                'description' => 'required|string|max:1000',
            ]);
            $activity = ActivittiesResponses::find($validatedData['activity_id']);

            if($request->hasFile('filepath')){
                $image = $request->file('filepath');
                $imageName = time(). '.' .$image->getClientOriginalExtension();
                $filePath = public_path('public/images');
                $image->move($filePath,$imageName);
                $validatedData['filepath'] = 'images/' . $imageName;
                }
                else{
                    $validatedData['filepath'] = null;
                }

            $activity = ActivittiesResponses::create([
                'user_id' => Auth::user()->id,
                'activitties_id' => $request->activity_id,
                'filepath' => $validatedData['filepath'],
                'description' => $validatedData['description'],
                'check' => false,
                'note' => 0.0,
            ]);

            return redirect()->route('ActivittiesResponses')->with('success', 'Resposta Enviada!');
        }

    public function show($id)
    {
        $activity = Activitties::where('id', $id)->first();
        return view('responsesshow', compact('activity'));
    }

    public function responsesshow($id)
    {
        $activity = Activitties::where('id', $id)->first();
        return view('ver_responsesshow', compact('activity'));
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

