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
        Discipline::create([
            'name'=> $request->name
         ]);
         return redirect('disciplina');
    }

    public function show($id){
        $disciplines = Discipline::find($id);
        return view('disciplina')->with('disciplina', $disciplines);

    }
}
