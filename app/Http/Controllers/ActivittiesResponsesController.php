<?php

namespace App\Http\Controllers;

use App\Models\Activitties;
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
        return view('activittiesresponses', compact('activity'));
    }

    public function store(Request $request)
    {
            $validatedData = $request->validate([
                'filepath' => 'nullable|file|mimes:jpg,png,jpeg,gif|max:2048',
                'description' => 'required|string|max:1000',
            ]);

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
            $activitties = Activitties::create([
                'user_id' => auth()->user()->id,
                'dicipline_id' => $validatedData['disciplina'],
                'name' => $validatedData['name'],
                'filepath' => $validatedData['filepath'],
                'description' => $validatedData['description'],
            ]);

            return redirect()->route('ActivittiesResponses')->with('success', 'Atividade Criada!');

    }

    public function show($id)
    {
        $activity = Activitties::where('id', $id)->first();
        return view('responsesshow', compact('activity'));
    }

}

