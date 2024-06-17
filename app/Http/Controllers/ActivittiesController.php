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

        try {
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

            return redirect()->route('Activitties')->with('flash message', 'Atividade Criada!');
        } catch (\Exception $ex) {
           dd($ex->getMessage());
        }

    }

    public function show($id)
    {
        $activity = Activitties::where('id', $id)->first();
        return view('activittiesshow', compact('activity'));

    }

    public function edit($id)
    {
        $activitties = Activitties::findOrFail($id);
        $diciplines = Discipline::all();
        return view('activittiesedit');
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

            return redirect()->route('activitties')->with('flash_message', 'Atividade Deletada!');
        }

}

