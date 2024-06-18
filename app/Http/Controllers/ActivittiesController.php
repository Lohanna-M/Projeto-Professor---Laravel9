<?php

namespace App\Http\Controllers;

use App\Models\Activitties;
use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ActivittiesController extends Controller
{
    public function index ()
    {
        $activitties = Activitties::with('diciplines')->get();
        return view('activitties')->with('activitties', $activitties);
    }

    public function create()
    {
        $diciplines = Discipline::all();
        return view('registers.registeractivitties', compact('diciplines'));
    }

    public function store(Request $request)
    {
            $validatedData = $request->validate([
                'disciplina' => 'required|integer',
                'name' => 'required|string|max:255',
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

            return redirect()->route('Activitties', 'ActivittiesResponses')->with('flash message', 'Atividade Criada!');

    }

    public function show($id)
    {
        $activity = Activitties::where('id', $id)->first();
        return view('activittiesshow', compact('activity'));

    }

    public function edit($id)
    {
        $activity = Activitties::findOrFail($id);
        $diciplines = Discipline::all();
        return view('activittiesedit', compact('activity', 'diciplines'));
    }

    public function update(Request $request, $id)
    {
        $activitties = Activitties::findOrFail($id);

        $validatedData = $request->validate([
             'disciplina' => 'required|integer',
                'name' => 'required|string|max:255',
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
        $activitties->update($validatedData);

        return redirect()->route('Activitties')->with('flash_message', 'Atividade Atualizada');
    }

        public function destroy($id)
        {
            $activity = Activitties::findOrFail($id);
            unlink(public_path('public/'.$activity->filepath));
            $activity->delete();

            return redirect()->route('Activitties')->with('flash_message', 'Atividade Deletada!');
        }

}

