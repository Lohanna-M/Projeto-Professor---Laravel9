<?php

namespace App\Http\Controllers;

use App\Models\Activitties;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class ActivittiesController extends Controller
{
    public function index ()
    {
        $activitties = Activitties::all();
        return view('activitties')->with('activitties', $activitties);
    }

    public function create()
    {
        $diciplines = Disciplina::all();
        return view('registers.registeractivitties', compact('diciplines'));
    }

    public function store(Request $request)
    {
        Activitties::create([
           'user_id'=> 'dicipline_id'
        ]);
        return redirect('activitties')->with('flash message', 'Atividade Criada!');

    }

    public function show($user_id)
    {
        $activitties = Activitties::find($user_id);
        return view('activitties')->with('activitties', $activitties);
    }
}
