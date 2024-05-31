<?php

namespace App\Http\Controllers;

use App\Models\Activitties;
use App\Models\Discipline;
use Illuminate\Http\Request;
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
        if($request->hasFile('filepath')){
        $image = $request->file('filepath');
        $imageName = time(). '.' .$image->getClientOriginalExtension();
        $filePath = public_path('public/images');
        $image->move($filePath,$imageName);
    }
        $activitties = Activitties::create([
            'user_id'=> auth()->user()->user_id,
           'dicipline_id' => $request->dicipline,
           'dicipline_id' => $request->name,
           'dicipline_id' => $request->filepath,
           'dicipline_id' => $request->description,
        ]);
        return redirect('activitties')->with('flash message', 'Atividade Criada!');
    }


    public function show($user_id)
    {
        $activitties = Activitties::find($user_id);
        return view('activitties')->with('activitties', $activitties);
    }

    public function update(Activitties $activitties, Request $request)
    {
        $input = $request->validated();

        if (!empty($input['filepath']) && $input['filepath']->isValid()){
           Storage::delete($activitties->filepath ?? '');
           $file = $input['filepath'];
           $path = $file->store('public/activitties');
           $input['filepath'] = $path;
       }
    }
}

