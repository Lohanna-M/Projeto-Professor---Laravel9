<?php

namespace App\Http\Controllers;
use App\Models\Discipline;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function index ()
    {
        $disciplines = Discipline::orderBy('updated_at', 'desc')->get();
        return view('disciplina')->with('disciplines', $disciplines);
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

    public function edit($id){
        $dicipline = Discipline::findOrFail($id);
        return view('disciplinaedit', compact('dicipline'));
    }

    public function update(Request $request, $id){
        $disciplines = Discipline::findOrFail($id);
        $request->validate([
            'name' => 'required|',
        ]);

        $disciplines->update($request->only('name'));
        return redirect()->route('Disciplina')->with('success', 'Disciplina atualizada');
    }

    public function destroy($id)
    {
        $dicipline = Discipline::findOrFail($id);
        $dicipline->delete();
        return redirect()->route('Disciplina')->with('fail', 'Atividade Deletada!');
    }

}
