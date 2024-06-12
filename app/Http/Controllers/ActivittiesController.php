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
        $activitties = Activitties::all();
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
            'dicipline' => 'required|integer',
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
            'dicipline_id' => $validatedData['dicipline'],
            'name' => $validatedData['name'],
            'filepath' => $validatedData['filepath'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('activitties')->with('flash message', 'Atividade Criada!');

    }

    public function show($id)
    {
        $activitties = Activitties::where('user_id', $id)->get();
        return view('activitties', compact('activitties'));
    }

    public function edit($id)
    {
        $activitties = Activitties::findOrFail($id);
        $diciplines = Discipline::all();
        return view('activitties.edit', compact('activitties', 'discipline'));
    }

    public function update(Activitties $activitties, Request $request)
    {
        $validatedData = $request->validate([
            'dicipline' => 'required|integer',
            'name' => 'required|string|max:255',
            'filepath' => 'nullable|file|mimes:jpg,png,jpeg,gif|max:2048',
            'description' => 'required|string|max:1000',
        ]);


        if($request->hasFile('filepath') && $request->file('filepath')->isValid()){
            Storage::delete($activitties->filepath);
            $file = $request->file('filepath');
            $path = $file->store('public/activitties');
            $validatedData['filepath'] = $path;
        }
            else{
                unset($validatedData['filepath']);
            }

        $activitties->update($validatedData);

        return redirect()->route('activitties')->with('flash_message', 'Atividade Atualizada');
    }
        public function destroy($id)
        {
            $activitties = Activitties::findOrFail($id);
            Storage::delete($activitties->filepath);
            $activitties->delete();

            return redirect()->route('activitties.index')->with('flash_message', 'Atividade Deletada!');
        }

}

