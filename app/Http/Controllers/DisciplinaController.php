<?php

namespace App\Http\Controllers;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function index ()
    {
        $disciplines = Disciplina::all();
        return view('Disciplina')->with('disciplina', $disciplines);
    }

    public function create()
    {
        $discipline = Disciplina::get();
        return view('registers.registeractivitties', compact('discipline'));
    }

    public function store()
    {

    }
}
