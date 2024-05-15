<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function index (Request $request)
    {
        return view('Disciplina');
    }
}
