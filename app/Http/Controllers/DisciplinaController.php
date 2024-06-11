<?php

namespace App\Http\Controllers;
use App\Models\Discipline;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function index ()
    {
        $disciplines = Discipline::all();
        return view('disciplina')->with('discipline', $disciplines);
    }

    public function create()
    {
        return view('registers.registerdisciplina');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|',
        ]);

        Discipline::create([
            'name'=> $request->name
         ]);
         return redirect()->route('Disciplina')->with('success', 'Disciplina adicionada');
    }

    public function show($id){
        $disciplines = Discipline::find($id);
        return redirect()->route('Disciplina')->with('disciplina', $disciplines);
    }
}
